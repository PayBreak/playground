<template>
    <div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel Vue JS Item CRUD</h2>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                        Create Item
                    </button>
                </div>
            </div>
        </div>

        <!-- Item Listing -->
        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th width="200px">Action</th>
            </tr>
            <tr v-for="item in items">
                <td>@{{ item.title }}</td>
                <td>@{{ item.description }}</td>
                <td>
                    <button class="btn btn-primary" @click.prevent="editItem(item)">Edit</button>
                    <button class="btn btn-danger" @click.prevent="deleteItem(item)">Delete</button>
                </td>
            </tr>
        </table>

        <!-- Pagination -->
        <nav>
            <ul class="pagination">
                <li v-if="pagination.current_page > 1">
                    <a href="#" aria-label="Previous"
                       @click.prevent="changePage(pagination.current_page - 1)">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li v-for="page in pagesNumber"
                    v-bind:class="[ page == isActived ? 'active' : '']">
                    <a href="#"
                       @click.prevent="changePage(page)">@{{ page }}</a>
                </li>
                <li v-if="pagination.current_page < pagination.last_page">
                    <a href="#" aria-label="Next"
                       @click.prevent="changePage(pagination.current_page + 1)">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Create Item Modal -->
        <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                    </div>
                    <div class="modal-body">

                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createItem">

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" class="form-control" v-model="newItem.title" />
                                <span v-if="formErrors['title']" class="error text-danger">@{{ formErrors['title'] }}</span>
                            </div>

                            <div class="form-group">
                                <label for="title">Description:</label>
                                <textarea name="description" class="form-control" v-model="newItem.description"></textarea>
                                <span v-if="formErrors['description']" class="error text-danger">@{{ formErrors['description'] }}</span>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Item Modal -->
        <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
                    </div>
                    <div class="modal-body">

                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" class="form-control" v-model="fillItem.title" />
                                <span v-if="formErrorsUpdate['title']" class="error text-danger">@{{ formErrorsUpdate['title'] }}</span>
                            </div>

                            <div class="form-group">
                                <label for="title">Description:</label>
                                <textarea name="description" class="form-control" v-model="fillItem.description"></textarea>
                                <span v-if="formErrorsUpdate['description']" class="error text-danger">@{{ formErrorsUpdate['description'] }}</span>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

var vm = new Vue({

    el: '#manage-vue',

    data: {
        items: [],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,
        formErrors:{},
        formErrorsUpdate:{},
        newItem : {'title':'','description':''},
        fillItem : {'title':'','description':'','id':''}
    },

    computed: {
        isActived: function () {
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },

    mounted : function(){
        this.$nextTick(function () {
            this.getVueItems(this.pagination.current_page);
        })
    },

    methods : {

        getVueItems: function(page){
            this.$http.get('/vueitems?page='+page).then((response) => {
                this.items = response.data.data.data;
                this.pagination = response.data.pagination;
            });
        },

        createItem: function(){
            var input = this.newItem;
            this.$http.post('/vueitems',input).then((response) => {
                this.changePage(this.pagination.current_page);
            this.newItem = {'title':'','description':''};
            $("#create-item").modal('hide');
            toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
        }, (response) => {
                this.formErrors = response.data;
            });
        },

        deleteItem: function(item){
            this.$http.delete('/vueitems/'+item.id).then((response) => {
                this.changePage(this.pagination.current_page);
            toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        });
        },

        editItem: function(item){
            this.fillItem.title = item.title;
            this.fillItem.id = item.id;
            this.fillItem.description = item.description;
            $("#edit-item").modal('show');
        },

        updateItem: function(id){
            var input = this.fillItem;
            this.$http.put('/vueitems/'+id,input).then((response) => {
                this.changePage(this.pagination.current_page);
            this.fillItem = {'title':'','description':'','id':''};
            $("#edit-item").modal('hide');
            toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
        }, (response) => {
                this.formErrorsUpdate = response.data;
            });
        },

        changePage: function (page) {
            this.pagination.current_page = page;
            this.getVueItems(page);
        }

    }

});
</script>
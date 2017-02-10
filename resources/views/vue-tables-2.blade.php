@extends('test-vue.resources.views.layouts.app')

@section('content')
<style>
    #demo-vue-tables-2 {
        text-align: center;
        width: 95%;
        margin: 0 auto;
    }

    h2 {
        margin-bottom: 30px;
    }

    th,
    td {
        text-align: left;
    }

    th:nth-child(n+2),
    td:nth-child(n+2) {
        text-align: center;
    }

    thead tr:nth-child(2) th {
        font-weight: normal;
    }

    .VueTables__sort-icon {
        margin-left: 10px;
    }

    .VueTables__dropdown-pagination {
        margin-left: 10px;
    }

    .VueTables__highlight {
        background: yellow;
        font-weight: normal;
    }

    .VueTables__sortable {
        cursor: pointer;
    }

    .VueTables__date-filter {
        border: 1px solid #ccc;
        padding: 6px;
        border-radius: 4px;
        cursor: pointer;
    }

    .VueTables__filter-placeholder {
        color: #aaa;
    }

    .VueTables__list-filter {
        width: 120px;
    }

</style>

<div id="demo-vue-tables-2">
    <div class="alphabet-filter">
        <p>Custom Filter</p>
        <button class="btn btn-default" :class="{active:letter==selectedLetter}" v-for="letter in letters" @click="alphabetFilter(letter)">@{{letter}}</button>
        <button class="btn btn-default" @click="alphabetFilter('')">Clear</button>
    </div>

    <hr />

    <v-client-table :data="tableData" :columns="columns" :options="options"></v-client-table>
    {{--<p v-cloak>@{{ tableData }}</p>--}}
</div>

<script>
    const app = new Vue({
        el: '#demo-vue-tables-2',
        data: {
            columns: ['id','first_name','last_name', 'email', 'address', 'postcode', 'dob', 'created_at'],
            tableData: [],
            letters: ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'],
            selectedLetter: '',
            options: {
//               dateColumns: ['dob'],
                headings: {
                    id: '#',
                    first_name: 'First Name',
                    last_name: 'Last Name',
                    email: 'Email',
                    address: 'Address',
                    postcode: 'Postcode',
                    dob: 'Date of Birth',
                    created_at: 'Created',
//                    edit: 'Edit',
//                    delete: 'Delete',
                },
                templates: {
                    {{--edit: function(row) {--}}
                        {{--return `<a href='#!/${row.id}/edit'><i class='glyphicon glyphicon-edit'></i></a>`--}}
                    {{--},--}}
                    {{--delete: function(row) {--}}
                        {{--return `<a href='javascript:void(0);' @click='$parent.deleteMe(${row.id})'><i class='glyphicon glyphicon-erase'></i></a>`--}}
                    {{--}--}}
                },

                listColumns: {
                    first_name: [{
                        id: 'Zoila',
                        text: 'Zoila'
                    }, {
                        id: 'Ava',
                        text: 'Ava'
                    }, {
                        id: 'Marian',
                        text: 'Marian'
                    }, {
                        id: 'Ramona',
                        text: 'Ramona'
                    }, {
                        id: 'Gerard',
                        text: 'Gerard'
                    }]
                },

                customFilters: [{
                    name: 'alphabet',
                    callback: function(row, query) {
                        return row.name[0] == query;
                    }
                }]

            }
        },
        mounted : function(){
            this.$nextTick(function () {
                this.getData();
            })
        },

        methods: {
            alphabetFilter: function(letter) {
                this.selectedLetter = letter;
                this.$broadcast('vue-tables.filter::alphabet', letter);
            },
            getData: function(){
                this.$http.get('/items').then((response) => {
                    this.tableData = response.data;
                });
            },
        }
    });
</script>

@endsection

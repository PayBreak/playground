@extends('test-vue.resources.views.layouts.app')

@section('content')
    <!-- demo root element -->
    <div id="demo">
        <form id="search">
            <div class="form-group pull-right">
                <label for="query">Search</label>
                <input name="query" v-model="searchQuery">
            </div>
        </form>

        <demo-grid
                :data="gridData"
                :columns="gridColumns"
                :filter-key="searchQuery">
        </demo-grid>

        {{--<p v-cloak>@{{ gridData }}</p>--}}
    </div>

    <script>
        // bootstrap the demo
        var demo = new Vue({
            el: '#demo',
            data: {
                searchQuery: '',
                gridColumns: ['id', 'title', 'description'],
                gridData:  []
            },

            mounted : function(){
                this.$nextTick(function () {
                    this.getData();
                })
            },

            methods: {
                getData: function(){
                    this.$http.get('/items').then((response) => {
                        this.gridData = response.data;
                    });
                },
            }
        });

    </script>
@endsection

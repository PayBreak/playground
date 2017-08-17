@extends('layouts.app')

@section('content')
    <div id="app">
        <div id="table-wrapper" class="ui container">
            <h2><strong>&lt;Vuetable-2&gt;</strong> with Bootstrap 3</h2>
            <div id="spinner" class="loading" style="display:none">Loading&#8230;</div>
            <vuetable ref="vuetable"
                      api-url="https://vuetable.ratiw.net/api/users"
                      :fields="fields"
                      :sort-order="sortOrder"
                      :css="css.table"
                      pagination-path=""
                      :per-page="10"
                      @vuetable:pagination-data="onPaginationData"
                      @vuetable:loading="onLoading"
                      @vuetable:loaded="onLoaded"
            >
                <template slot="actions" scope="props">
                    <div class="table-button-container">
                        <button class="btn btn-warning btn-sm" @click="editRow(props.rowData)">
                            <span class="glyphicon glyphicon-pencil"></span> Edit</button>&nbsp;&nbsp;
                        <button class="btn btn-danger btn-sm" @click="deleteRow(props.rowData)">
                            <span class="glyphicon glyphicon-trash"></span> Delete</button>&nbsp;&nbsp;
                    </div>
                </template>
            </vuetable>
            <vuetable-pagination ref="pagination"
                                 :css="css.pagination"
                                 @vuetable-pagination:change-page="onChangePage"
            ></vuetable-pagination>
        </div>

    </div>
@endsection

<template>
    <div>
        <filter-bar></filter-bar>
        <vuetable ref="consumersTable"
            api-url="/api/consumers"
            :fields="fields"
            pagination-path=""
            :per-page="15"
            detail-row-component="consumers-detail-row"
            :append-params="additionalQueryParameters"
            @vuetable:cell-clicked="onCellClicked"
            @vuetable:pagination-data="onPaginationData"
        ></vuetable>
        <div class="level">
            <vuetable-pagination ref="consumersPagination"
                 @vuetable-pagination:change-page="onChangePage"
            ></vuetable-pagination>
            <vuetable-pagination-info ref="paginationInfo"></vuetable-pagination-info>
        </div>
    </div>
</template>

<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable'
//    import VuetablePagination from 'vuetable-2/src/components/Vue tablePagination' // <-- Default
    import VuetablePagination from './layout/Pagination' // <-- Custom
    import VuetablePaginationInfo from './layout/PaginationInfo' // <-- Custom

    import DetailRow from './ConsumersDetails' // <-- Custom (?)
    import FilterBar from './layout/Filter'

    Vue.component('consumers-detail-row', DetailRow)   // <--- register the component to Vue
    Vue.component('consumers-filter-bar', FilterBar)   // <--- register the component to Vue

    export default {
        components: {
            Vuetable,
            VuetablePagination,
            VuetablePaginationInfo,
            DetailRow,
            FilterBar
        },
        data: function() {
            return {
                fields: [
                    {
                        name: 'id',
                    },
                    {
                        name: 'first_name',
                        title: 'First Name'
                    },
                    {
                        name: 'last_name',
                        title: 'Last Name'
                    },
                    'email',
                    {
                        name: 'date_of_birth',
                        title: 'DOB son',
                        titleClass: 'sample-class-on-title-that-does-nothing'
                    }
                ],
                additionalQueryParameters: {
                    api_token: window.Laravel.api_token
                }
            }
        },
        methods: {
            onPaginationData (paginationData) {
                this.$refs.consumersPagination.setPaginationData(paginationData)
                this.$refs.paginationInfo.setPaginationData(paginationData)
            },
            onChangePage (page) {
                console.log(this.$props);
                this.$refs.consumersTable.changePage(page)
            },
            onCellClicked (data, field, event) {
                console.log('cellClicked: ', field.name)
                this.$refs.consumersTable.toggleDetailRow(data.id)
            }
        }
    }
</script>

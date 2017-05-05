<template>
    <div>
        <vuetable ref="consumersTable"
            api-url="/api/consumers"
            :fields="fields"
            pagination-path=""
            :per-page="25"
            @vuetable:pagination-data="onPaginationData"
        ></vuetable>
        <div class="level">
            <vuetable-pagination ref="consumersPagination"
                 @vuetable-pagination:change-page="onChangePage"
            ></vuetable-pagination>
            <vuetable-pagination-info ref="paginationInfo"></vuetable-pagination-info>
            </div>
        </div>
    </div>
</template>

<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable'
//    import VuetablePagination from 'vuetable-2/src/components/VuetablePagination' // <-- Default
    import VuetablePagination from './layout/Pagination' // <-- Custom
    import VuetablePaginationInfo from './layout/PaginationInfo' // <-- Custom

    export default {
        components: {
            Vuetable,
            VuetablePagination,
            VuetablePaginationInfo
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
                tableLoading: false
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
            }
        }
    }
</script>
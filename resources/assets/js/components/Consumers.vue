<template>
    <div>
        <filter-bar :filters="fields"></filter-bar>
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
    import VueEvents from 'vue-events'
//    import VuetablePagination from 'vuetable-2/src/components/Vue tablePagination' // <-- Default
    import VuetablePagination from './layout/Pagination' // <-- Custom
    import VuetablePaginationInfo from './layout/PaginationInfo' // <-- Custom

    import DetailRow from './ConsumersDetails' // <-- Custom (?)
    import FilterBar from './layout/Filter'

    Vue.component('consumers-detail-row', DetailRow)   // <--- register the component to Vue
    Vue.component('consumers-filter-bar', FilterBar)   // <--- register the component to Vue
    Vue.use(VueEvents)

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
                        title: 'Id'
                    },
                    {
                        name: 'first_name',
                        title: 'First Name'
                    },
                    {
                        name: 'last_name',
                        title: 'Last Name'
                    },
                    {
                        name: 'email',
                        title: 'Email Address'
                    },
                    {
                        name: 'date_of_birth',
                        title: 'Date of Birth',
                        titleClass: 'sample-class-on-title-that-does-nothing'
                    }
                ],
                additionalQueryParameters: {
                    api_token: window.Laravel.api_token
                },
                defaultQueryParameters: {
                    api_token: window.Laravel.api_token
                },
                addedFilters: {}
            }
        },
//        watch: {
//            additionalQueryParameters () {
//                this.remainingFilters = this.fields.filter(x => this.additionalQueryParameters.hasOwnProperty(x.name) > 0);
//            }
//        },
        mounted () {
//            this.$events.$on('filter-set', eventData => this.onFilterSet(eventData))
            this.$events.$on('filter-set', eventData => this.onFilterAdd(eventData))
            this.$events.$on('filter-remove', eventData => this.onFilterRemove(eventData))
//            this.$events.$on('filter-reset', e => this.onFilterReset())
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
            },
            onFilterAdd (eventData) {
                let filters = {}
                Object.keys(eventData).forEach(function(key) {
                    console.log(eventData)
                    filters[eventData[key].name] = eventData[key].filterValue
                });

                this.additionalQueryParameters = Object.assign(this.defaultQueryParameters, filters)
                this.filterRefresh()
            },
            onFilterRemove (removedFilter) {
                this.$delete(this.additionalQueryParameters, removedFilter)
                this.filterRefresh()
            },
            filterRefresh() {
                Vue.nextTick(() => this.$refs.consumersTable.refresh())
            },
            onFilterSet (filterText) {
                this.additionalQueryParameters.first_name = filterText
                Vue.nextTick( () => this.$refs.consumersTable.refresh())
            },
            onFilterReset () {
                this.additionalQueryParameters = this.defaultQueryParameters
                Vue.nextTick( () => this.$refs.consumersTable.refresh())
            }
        }
    }
</script>
diff = A.filter(x => B.indexOf(x) < 0 );
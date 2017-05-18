<template>
    <grid-table
        :tableFields="fields"
        :detailRowComponentName="detailRowComponentName"
        :gridFilterComponentName="gridFilterComponentName"
        :apiUrl="apiUrl"
    ></grid-table>
</template>

<script>
    import GridTable from './layout/GridTable'

    // Detail row component
    import DetailRow from './layout/details/ConsumersDetail'
    Vue.component('consumers-detail-row', DetailRow)   // <--- register the component to Vue

    // Grid filter component
    import FilterBar from './layout/GridTableFilter'
    Vue.component('filter-bar', FilterBar)   // <--- register the component to Vue

    export default {
        components: {
            GridTable
        },
        data: function() {
            return {
                detailRowComponentName: 'consumers-detail-row',
                gridFilterComponentName: 'filter-bar',
                apiUrl: '/api/consumers',
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
                        name: 'dob',
                        title: 'Date of Birth',
                        titleClass: 'sample-class-on-title-that-does-nothing'
                    }
                ]
            }
        }
    }
</script>

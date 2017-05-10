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
    import DetailRow from './ConsumersDetails'
    Vue.component('consumers-detail-row-boi', DetailRow)   // <--- register the component to Vue

    // Grid filter component
    import FilterBar from './layout/Filter'
    Vue.component('consumers-filter-bar', FilterBar)   // <--- register the component to Vue

    export default {
        components: {
            GridTable
        },
        data: function() {
            return {
                detailRowComponentName: 'consumers-detail-row-boi',
                gridFilterComponentName: 'consumers-filter-bar',
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
                        name: 'date_of_birth',
                        title: 'Date of Birth',
                        titleClass: 'sample-class-on-title-that-does-nothing'
                    }
                ]
            }
        }
    }
</script>

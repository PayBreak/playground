<template>
    <grid-table
        :tableFields="fields"
        :gridFilterComponentName="gridFilterComponentName"
        :apiUrl="apiUrl"
    ></grid-table>
</template>

<script>
    import GridTable from '../layout/GridTable'

    // Grid filter component
    import FilterBar from '../layout/GridTableFilter'
    Vue.component('filter-bar', FilterBar)   // <--- register the component to Vue

    // Loan Actions
    import LoanActions from './IndexActions'
    Vue.component('loan-actions', LoanActions)

    export default {
        components: {
            GridTable
        },
        data () {
            return {
                gridFilterComponentName: 'filter-bar',
                apiUrl: '/api/loans',
                fields: [
                    {
                        name: 'account_number',
                        title: 'Account Number',
                    },
                    {
                        name: 'user',
                        title: 'User'
                    },
                    {
                        name: 'nickname',
                        title: 'Description'
                    },
                    {
                        name: 'merchant_tx',
                        title: 'MTX'
                    },
                    {
                        name: 'active',
                        title: 'Active',
                        dataClass: 'has-text-centered',
                        callback: this.loanIsActive
                    },
                    {
                        name: '__component:loan-actions',
                        title: 'Actions',
                        filterable: false
                    }
                ],
            }
        },
        methods: {
            loanIsActive (value) {
                return value == 0 ?
                    '<span class="icon is-small"><i class="fa fa-times" aria-hidden="true"></i></span>' :
                    '<span class="icon is-small"><i class="fa fa-times" aria-hidden="true"></i></span>'
            }
        }
    }
</script>

<template>
    <div class="content">

    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        components: {

        },
        data () {
            return {
                account: {}
            }
        },
        props: {
            accountNumber: {
                type: Number,
                required: true
            }
        },
        computed: {
            apiUrl () {
                return '/api/loans/' + this.accountNumber
            },
        },
        mounted () {
            this.getData()
        },
        methods: {
            getData () {
                axios.get(this.apiUrl).then(response => {
                    console.log(response.data)
                    this.account = response.data
                })
            }
        },
        events () {

        }
    }
</script>

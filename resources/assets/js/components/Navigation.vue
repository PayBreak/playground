<!--<template>-->
    <!--<section class="container">-->
        <!--&lt;!&ndash;<consumers></consumers>&ndash;&gt;-->
        <!--<loans></loans>-->
    <!--</section>-->
<!--</template>-->

<script>
//    import Consumers from './Consumers'
    import Loans from './loan/Loans'

    export default {
        name: 'app',
        components: {
//            consumers: Consumers
            loans: Loans
        }
    }
</script>

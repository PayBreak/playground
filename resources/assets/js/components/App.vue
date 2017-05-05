<template>
    <section class="container">
        <consumers></consumers>
    </section>
</template>

<script>
    import Consumers from './Consumers'

    export default {
        name: 'app',
        components: {
            consumers: Consumers
        }
    }
</script>

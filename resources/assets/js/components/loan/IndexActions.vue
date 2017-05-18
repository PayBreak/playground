<template>
    <p class="field">
        <a class="button is-small" :href="'/loans/' + rowData.account_number">
            <span class="icon is-small">
              <i class="fa fa-eye"></i>
            </span>
        </a>
        <a class="button is-small">
            <span class="icon is-small">
              <i class="fa fa-ban"></i>
            </span>
        </a>
        <a class="button is-small">
            <span class="icon is-small">
              <i class="fa fa-check"></i>
            </span>
        </a>
    </p>
</template>

<script>
    export default {
        props: {
            rowData: {
                type: Object,
                required: true
            },
            rowIndex: {
                type: Number
            }
        },
        methods: {
            itemAction (action, data, index) {
                console.log('custom-actions: ' + action, data.name, index)
            }
        }
    }
</script>

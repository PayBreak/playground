<template>
    <div class="content" @click="onClick">
        <div class="inline field">
            <label>Id: </label>
            <span>{{rowData.id}}</span>
        </div>
        <div class="inline field">
            <label>First: </label>
            <span>{{rowData.first_name}}</span>
        </div>
        <div class="inline field">
            <label>Last: </label>
            <span>{{rowData.last_name}}</span>
        </div>
        <div class="inline field">
            <label>Email: </label>
            <span>{{rowData.email}}</span>
        </div>
        <div class="inline field">
            <label>Bday: </label>
            <span>{{rowData.date_of_birth}}</span>
        </div>
    </div>
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
            onClick (event) {
                console.log('my-detail-row: on-click', event.target)
            }
        },
    }
</script>

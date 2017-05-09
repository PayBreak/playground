<!--<template>-->
    <!--<div class="filter-bar ui basic segment grid">-->
        <!--<div class="ui form">-->
            <!--<div class="inline field">-->
                <!--<label>Search for:</label>-->
                <!--<input type="text" v-model="filterText" class="three wide column" @keyup.enter="doFilter" placeholder="name, nickname, or email">-->
                <!--<button class="ui primary button" @click="doFilter">Go</button>-->
                <!--<button class="ui button" @click="resetFilter">Reset</button>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
<!--</template>-->
<template>
    <div ref="filterTemplate">
        <template v-if="filtersAdded">
            <div class="content">
                <template v-for="n, key in filtersAdded">
                    <!--<div class="column">-->
                        <!--<p>{{ n.title }}</p>-->
                    <!--</div>-->
                    <span class="tag is-primary">
                        {{ n.title }}: {{n.filterValue}}
                        <button class="delete is-small" @click="removeFilter(n.name, key)"></button>
                    </span>
                </template>
            </div>
        </template>
        <template v-if="filtersRemaining">
            <div class="columns">
                <div class="field">
                    <p class="control">
                        <span class="select">
                            <select ref="filterSelect" v-model="filterName" required>
                                <option hidden disabled selected value="">Filter option</option>
                                <template v-for="n, key in filtersRemaining">
                                    <option :value="n.name"
                                            v-html="n.name"
                                    ></option>
                                </template>
                            </select>
                        </span>
                    </p>
                </div>
                <div class="field">
                    <p class="control">
                        <input class="input" type="text" v-model="filterValue" @keyup.enter="addFilter" ref="filterValue">
                    </p>
                </div>
                <button type="button" @click="addFilter">Add filter</button>
            </div>
        </template>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                filtersRemaining: {},
                filtersAdded: {},
                filterName: '',
                filterValue: ''
            }
        },
        props: {
            filters: {
                type: Array,
                default() {
                    return []
                }
            },
        },
        mounted () {
            this.filtersRemaining = Array.from(this.filters)
        },
        methods: {
            addFilter () {
                let addIndex = this.filters.map((el) => el.name).indexOf(this.filterName)
//                console.log(addIndex)
                this.$set(this.filtersAdded, addIndex, this.filters[addIndex])
                this.$set(this.filtersAdded[addIndex], 'filterValue', this.filterValue)

                let removeIndex = this.filtersRemaining.map((el) => el.name).indexOf(this.filterName)
                console.log(removeIndex)
                this.$delete(this.filtersRemaining, removeIndex)

//                this.$nextTick(function () {
                    this.$events.fire('filter-set', this.filtersAdded)
//                })
//                this.filtersAdded[this.filterIndex] = this.filters[this.filterIndex]
//                this.filtersAdded[this.filterIndex].filterValue = this.filterValue
            },
            removeFilter (filterName, key) {
                console.log(filterName)
                console.log(key)
                let addIndex = this.filters.map((el) => el.name).indexOf(filterName)
                this.$delete(this.filtersAdded, key)
                this.$delete(this.filters[addIndex], 'filterValue')
                this.filtersRemaining.push(this.filters[addIndex])
                this.$events.fire('filter-remove', filterName)
//                let addToRemainingIndex = this.filters.map((el) => el.name).indexOf(filterName)
//                console.log(addToRemainingIndex)
//                this.$delete(this.filtersAdded, key)
//                console.log(this.filtersRemaining)
//                console.log(this.filtersRemaining.length)
////                this.$set(this.filtersRemaining, (this.filtersRemaining.length + 1), this.filters[addToRemainingIndex])
//                console.log(this.filtersRemaining)
//                this.$events.fire('filter-set', this.filtersAdded)
//                console.log(filterName)
            },
            filterInputRefresh () {

            }
        }
    }
</script>
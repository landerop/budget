<template>
    <div>
        <input type="text" :name="name" v-model="form" />
        <div class="date-picker">
            <div class="date-picker__top">
                <button @click="previous">
                    <i class="fa fa-arrow-left"></i>
                </button>
                <div>{{ displayYear }}, {{ displayMonth }}</div>
                <button @click="next">
                    <i class="fa fa-arrow-right"></i>
                </button>
            </div>
            <div class="date-picker__bottom">
                <button
                    v-for="i in maxDays(displayYear, displayMonth)"
                    @click="choose($event, i)"
                    :class="{ active: isActive(i) }"
                >{{ i }}</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            name: {
                default: 'date'
            }
        },

        data() {
            return {
                displayYear: new Date().getFullYear(),
                displayMonth: new Date().getMonth() + 1,
                year: new Date().getFullYear(),
                month: new Date().getMonth() + 1,
                date: new Date().getDate()
            }
        },

        computed: {
            form: function () {
                return this.year + '-' + this.addPotentialDigit(this.month) + '-' + this.addPotentialDigit(this.date)
            }
        },

        methods: {
            isActive: function (index) {
                if (this.year == this.displayYear && this.month == this.displayMonth && this.date == index) {
                    return true
                }

                return false
            },

            addPotentialDigit(x) {
                if (x.toString().length == 1) {
                    x = '0' + x
                }

                return x
            },

            previous(e) {
                if (e) {
                    e.preventDefault()
                }

                this.displayMonth --

                if (this.displayMonth < 1) {
                    this.displayMonth = 12

                    this.displayYear --
                }
            },

            next(e) {
                if (e) {
                    e.preventDefault()
                }

                this.displayMonth ++

                if (this.displayMonth > 12) {
                    this.displayMonth = 1

                    this.displayYear ++
                }
            },

            choose(e, index) {
                if (e) {
                    e.preventDefault()
                }

                this.year = this.displayYear
                this.month = this.displayMonth
                this.date = index
            },

            maxDays(year, month) {
                return new Date(year, month, 0).getDate()
            }
        }
    }
</script>

<template>
    <div class="grid grid-cols-4 gap-4">
        <div class="col-span-4 w-full border rounded h-10 flex justify-center items-center">{{this.currentEquation}}</div>
        <button @click="updateEquation(7)"
            class="w-16 border rounded p-2 bg-indigo-100 hover:bg-indigo-300 active:bg-indigo-400 active:shadow-lg">7</button>
        <button @click="updateEquation(8)"
            class="w-16 border rounded p-2 bg-indigo-100 hover:bg-indigo-300 active:bg-indigo-400 active:shadow-lg">8</button>
        <button @click="updateEquation(9)"
            class="w-16 border rounded p-2 bg-indigo-100 hover:bg-indigo-300 active:bg-indigo-400 active:shadow-lg">9</button>
        <button @click="updateEquation('*')"
            class="w-16 border rounded p-2 bg-pink-100 hover:bg-pink-300 active:bg-pink-400 active:shadow-lg">*</button>
        <button @click="updateEquation(4)"
            class="w-16 border rounded p-2 bg-indigo-100 hover:bg-indigo-300 active:bg-indigo-400 active:shadow-lg">4</button>
        <button @click="updateEquation(5)"
            class="w-16 border rounded p-2 bg-indigo-100 hover:bg-indigo-300 active:bg-indigo-400 active:shadow-lg">5</button>
        <button @click="updateEquation(6)"
            class="w-16 border rounded p-2 bg-indigo-100 hover:bg-indigo-300 active:bg-indigo-400 active:shadow-lg">6</button>
        <button @click="updateEquation('/')"
            class="w-16 border rounded p-2 bg-pink-100 hover:bg-pink-300 active:bg-pink-400 active:shadow-lg">÷</button>
        <button @click="updateEquation(1)"
            class="w-16 border rounded p-2 bg-indigo-100 hover:bg-indigo-300 active:bg-indigo-400 active:shadow-lg">1</button>
        <button @click="updateEquation(2)"
            class="w-16 border rounded p-2 bg-indigo-100 hover:bg-indigo-300 active:bg-indigo-400 active:shadow-lg">2</button>
        <button @click="updateEquation(3)"
            class="w-16 border rounded p-2 bg-indigo-100 hover:bg-indigo-300 active:bg-indigo-400 active:shadow-lg">3</button>
        <button @click="updateEquation('+')"
            class="w-16 border rounded p-2 bg-pink-100 hover:bg-pink-300 active:bg-pink-400 active:shadow-lg">+</button>
        <button @click="updateEquation(0)"
            class="w-16 border rounded p-2 bg-indigo-100 hover:bg-indigo-300 active:bg-indigo-400 active:shadow-lg">0</button>
        <button  @click="clearEquation()"
            class="w-16 border rounded p-2 bg-green-100 hover:bg-green-300 active:bg-green-400 active:shadow-lg">C</button>
        <button  @click="submitEquation()"
            class="w-16 border rounded p-2 bg-pink-100 hover:bg-pink-300 active:bg-pink-400 active:shadow-lg">=</button>
        <button  @click="updateEquation('-')"
            class="w-16 border rounded p-2 bg-pink-100 hover:bg-pink-300 active:bg-pink-400 active:shadow-lg">-</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            currentEquation: '',
            operators: ['*', '/', '+', '-'],
        }
    },
    methods: {
        updateEquation(value) {
            let stringifyValue = value.toString();
            let lastCharacter = this.currentEquation.substring(this.currentEquation.length - 1).toString();

            // Console logs that allowed me to debug the logic
            // console.log("Substring -2: ", lastCharacter)
            // console.log("Current Equation: ", this.currentEquation)
            // console.log("Current Char", this.operators.some(substring => stringifyValue.includes(substring)))
            // console.log("Last Char", this.operators.some(substring => lastCharacter.includes(substring)))
            // console.log("Length Determination: ", this.currentEquation.length - 1, this.currentEquation.length)
            // console.log("Stringify Value: ", stringifyValue)
            // console.log("Equation Length: ", this.currentEquation.length)

            // If the last input was an operator & the next input is also an operator then replace the last input with the new input. So that we don't have two operators following each other.
            if (this.operators.some(substring => stringifyValue.includes(substring)) && this.operators.some(substring => lastCharacter.includes(substring))) {
                //Replace the last operator with the new operator
                this.currentEquation = this.currentEquation.substring(0, this.currentEquation.length - 1) + stringifyValue

            // If the equation is currently on it's first character & you put in operators first then just invalidate it
            } else if(this.currentEquation.length === 0 && this.operators.some(substring => stringifyValue.includes(substring))){

            } else {
                this.currentEquation += stringifyValue;
                console.log("Else Current Equation: ", this.currentEquation)
            }
        },
        submitEquation() {
            // console.log("Substring val:", this.currentEquation.substring(this.currentEquation.length))

            // We need to validate that there is not an operator without a number to operate on
            const lastCharacter = this.currentEquation.substring(this.currentEquation.length - 1)
            if (
                this.currentEquation.length === 0 ||
                this.operators.some(operator => lastCharacter.includes(operator))
            ) {
                // console.log('Last Character was invalid')
            } else {
                // console.log('Completed Equation: ', this.currentEquation)
                this.$inertia.post('/calculate', this.$inertia.form({equation: this.currentEquation}))
                this.currentEquation = ''
            }
        },
        clearEquation() {
            this.currentEquation = ''
        }
    }
    }
</script>

<!-- TODO: Fix the @apply https://stackoverflow.com/questions/58848339/apply-not-working-inside-vue-component-in-laravel-mix -->
<!--<style lang="postcss" scoped>-->
<!--    .btn-calculator {-->
<!--        @apply w-16 border rounded p-2 bg-indigo-100 hover:bg-indigo-300 active:bg-indigo-400 active:shadow-lg;-->
<!--    }-->
<!--</style>-->

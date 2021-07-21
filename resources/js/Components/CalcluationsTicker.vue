<template>
    <div class="overflow-y-auto ml-6">
        <button class="border rounded p-2 mb-4 hover:bg-red-200 active:bg-red-400 active:shadow-lg" @click="deleteCalculations()">Clear All</button>
        <div class="grid grid-cols-3 gap-2">
            <div class="w-full pl-4 pr-4 hover:bg-red-200 active:bg-red-400 active:shadow-lg"
                 v-for="(calculation, index) in calculations" :key="calculation + index"
                 @click="deleteCalculation(calculation.id)"
                 :class="index % 2 ? 'bg-green-200': 'bg-yellow-200'">
                {{calculation.equation}} = {{calculation.solution}}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'calculations'
    ],
    methods: {
        deleteCalculation(calculationId) {
            // console.log('Delete: ', calculationId)
            this.$inertia.delete(this.route('calculation.destroy', calculationId))
        },
        deleteCalculations() {
            // console.log('Delete users: ', this.user.id)
            this.$inertia.delete(this.route('calculation.wipe'))
        }
    }
}
</script>

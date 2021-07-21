<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="mt-8 text-2xl">
                Welcome to your future proven calculator application!
            </div>

            <div class="mt-6 text-gray-500">
                Us at CalcTek like to consider ourselves forward thinking, passionate and motivated.
                We've brought to you what we consider the next best thing to the web. The CalcTek click-o-matic functionality machine!
                We understand that Wolfram Alpha is considered a top dog, but they have too many features, we know that you users want just what you need & nothing else.
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laravel.com/docs">Documentation</a></div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Calculators are hard to use, so we have you covered when it comes to documentation.
                    </div>

                    <a href="https://laravel.com/docs">
                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                <div>Explore the documentation</div>

                                <div class="ml-1 text-indigo-500">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-l">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Authentication</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        We know how important it is, that you as a user can't access someone else calculations, so us here at CalcTek, have gone the extra mile to ensure that your calculations are only accessible by you. Don't worry you're in safe hands.
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-8 mb-4">
            <div class="flex justify-center">
                <Calculator />
            </div>
            <div class="flex">
                <CalculationsTicker :calculations="calculations"/>
            </div>
        </div>
    </div>
</template>

<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'
    import Calculator from '@/Components/Calculator'
    import CalculationsTicker from '@/Components/CalcluationsTicker'

    export default {
        components: {
            JetApplicationLogo,
            Calculator,
            CalculationsTicker
        },
        props: [
            'calculations'
        ]
    }
</script>

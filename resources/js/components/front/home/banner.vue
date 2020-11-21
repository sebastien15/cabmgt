<template>
    <div class="px-40 text-lg bg-blue-400 -mt-6 pt-64 pb-10">
        <div class="w-7/12 m-auto flex">
            <div class="w-8/12 flex bg-white border-gray-300">
                <div class="border-2 border-gray-300 px-3">
                    <base-input  label="" placeholder="From" className="h-8 text-red-800 font-hairline text-lg border-0" ></base-input>
                </div>
                <div class="border-2 border-gray-300 px-3">
                    <base-input label=""   placeholder="to" className="h-8 text-red-800 font-hairline text-lg border-0" > </base-input>
                </div>
                <div class="border-2 border-gray-300 px-3">
                    <base-input  label="Date" placeholder="date" className="h-8 text-red-800 font-hairline text-lg border-0" ></base-input>
                </div>
            </div>
            <div class="w-4/12">
                <base-button className="h-16 px-10 bg-red-400 text-white font-hairline text-lg border-0 p-0"></base-button>
            </div>
        </div>  
    </div>
</template>

<script>
export default {
    name: "banner",
    methods: {
        addLabel(){
            // this.label = labelName
            console.log('hello')
        }
    },
}
</script>
<style scoped>
</style>


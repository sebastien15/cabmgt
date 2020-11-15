<template>
        <button class="form-input bg-gray-100 border-gray-200 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
               :type="type"
               :action="action"
               :class="className"
               :style="styles"
        >{{ text }}</button>
</template>

<script>
    export default {
        name: "BaseButton",
        props: {
            action: String,
            text: {
                type: String,
                default: 'submit'
            },
            type: {
                type: String,
                default: 'submit',
            },
            className: String,
            styles: String
        }
    }
</script>

<style scoped>

</style>

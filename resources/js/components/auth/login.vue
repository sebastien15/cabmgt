<template>
   <div class="min-h-screen flex items-center">
        <div class="bg-white w-full max-w-lg rounded-lg shadow overflow-hidden mx-auto">
            <div class="py-4 px-6">
                <div class="text-center font-bold text-gray-700 text-3xl">Brand</div>
                <div class="mt-1 text-center font-bold text-gray-600 text-xl">Welcome Back</div>
                <div class="mt-1 text-center text-gray-600">Login or Register</div>
                <form @submit.prevent="login()">
                    <div class="mt-4 w-full">
                        <input type="email" name="email" v-model="form.email" placeholder="Email address"
                               class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                    </div>
                    <div class="mt-4 w-full">
                        <input type="password" name="password" v-model="form.password" placeholder="Password"
                               class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                    </div>
                    <div class="flex justify-between items-center mt-6">
                        <a href="#" class="text-gray-600 text-sm hover:text-gray-500">Forget password?</a>
                        <button type="submit"
                                class="py-2 px-4 bg-gray-700 text-white rounded hover:bg-gray-600 focus:outline-none">
                            Login
                        </button>
                    </div>
                </form>
            </div>
            <div class="flex items-center justify-center py-4 bg-gray-100 text-center">
                <h1 class="text-gray-600 text-sm">Don't have an account</h1>
                <a href="/register" class="text-blue-600 font-bold mx-2 text-sm hover:text-blue-500">Register now</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "login",
    data() {
        return {
            form: new Form({
                    email: '',
                    password: '',
                }),
        }
    },
    methods: {
        login() {
            axios.post("/api/login").then( data=>(this.singleRoute = data.data[0] ))

        }
    },
    beforeMount() {
        this.login()
    },
}
</script>
<style scoped>

</style>


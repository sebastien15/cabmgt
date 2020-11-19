<template>
    <div>    
        <div class="p-5 flex justify-around mb-4">
            <div class="w-3/12 bg-blue-300 rounded-md p-5 py-10 cursor-pointer">
                <div class="flex justify-around">
                <p class="text-2xl font-bold">Pending bookings </p>
                <p class="rounded-full bg-blue-100 p-2 px-3 ml-4">2</p>
                </div>             
            </div>
            <div class="w-3/12 bg-green-300 rounded-md p-5 py-10 cursor-pointer">
                <div class="flex justify-around">
                <p class="text-2xl font-bold">Pending payments </p>
                <p class="rounded-full bg-green-100 p-2 px-3 ml-4">2</p>
                </div>         </div>
            <div class="w-3/12 bg-gray-300 rounded-md p-5 py-10 cursor-pointer">
                <div class="flex justify-around">
                <p class="text-2xl font-bold">Notifications </p>
                <p class="rounded-full bg-gray-100 p-2 px-3 ml-4">2</p>
                </div> 
            </div>
        </div>
        <hr class="w-10/12 bg-blue-400 m-auto" style="height: 1px">
        <div class="flex justify-around">
            <div class="w-1/2 p-2 md:pt-20 ">
                <div class="overflow-x-auto">
                    <table class="">
                        <thead class="border border-gray-900 ">
                            <tr class="p-2 text-sm font-bold">
                                <td class="border-r border-gray-900 p-2">id</td>
                                <td class="border-r border-gray-900 p-2">user_id</td>
                                <td class="border-r border-gray-900 p-2">route_id</td>
                                <td class="border-r border-gray-900 p-2">car_id</td>
                                <td class="border-r border-gray-900 p-2">seat_no</td>
                                <td class="border-r border-gray-900 p-2">payed</td>
                                <td class="border-r border-gray-900 p-2">approved</td>
                                <td class="border-r border-gray-900 p-2">nbr_people</td>
                                <td class="border-r border-gray-900 p-2">nbr_luggage</td>
                                <td class="border-r border-gray-900 p-2">pickup_date</td>
                                <td class="border-r border-gray-900 p-2">pickup_time</td>
                                <td class="border-r border-gray-900 p-2">pickup_full_add</td>
                                <td class="border-r border-gray-900 p-2">dropoff_full_add</td>
                                <td class="border-r border-gray-900 p-2">custom_message</td>
                                <td class="border-r border-gray-900 p-2">quick actions</td>
                            </tr>
                        </thead>
                        <tbody class="border border-gray-400 border-t-0">
                            <tr class="p-2 ">
                                <td class="border-r border-gray-400">1</td>
                                <td class="border-r border-gray-400">1</td>
                                <td class="border-r border-gray-400">1</td>
                                <td class="border-r border-gray-400">1</td>
                                <td class="border-r border-gray-400">1</td>
                                <td class="border-r border-gray-400">1</td>
                                <td class="border-r border-gray-400">1</td>
                                <td class="border-r border-gray-400">1</td>
                                <td class="border-r border-gray-400">1</td>
                                <td class="border-r border-gray-400">1</td>
                                <td class="border-r border-gray-400">1</td>
                                <td class="border-r border-gray-400">1</td>
                                <td class="border-r border-gray-400">1</td>
                                <td class="border-r border-gray-400">1</td>
                                <td class="border-r border-gray-400 flex">
                                    <span><i class="fa fa-eye text-2xl text-blue-400 cursor-pointer mr-1"></i></span>
                                    <span><i class="fa fa-trash text-2xl text-red-500 cursor-pointer"></i></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="w-1/2"></div>
        </div>
    </div>
</template>

<script>
export default {
    name: "operatordashboard",
    bookings:[],
    methods: {
            allbookings() {
                let booking = axios.get('../api/bookings')
                    .then(
                        console.log(this.booking)
                    )
            }
        },
    beforeMount(){
        this.allbookings()
    },
}
</script>
<style scoped>

</style>


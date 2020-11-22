<template>
    <div>    
        <div class="">
            <button class="border border-blue-500 p-2 text-md rounded-md mr-4" @click="()=>{this.addCarModel = !this.addCarModel}">Add a Car</button>
        </div>
        <div class="flex">
            <div class="p-2 md:pt-20 ">
                <h2 class="text-2xl font-bold" @click="allstations()"><u>All car</u></h2>
                <br>
                <div class="overflow-x-auto">
                    <table class="border border-blue-400 ">
                        <thead class="border border-blue-400 ">
                            <tr class="p-2 text-sm font-bold">
                                <td class="border-r border-blue-400 p-2">name</td>
                                <td class="border-r border-blue-400 p-2">image</td>
                                <td class="border-r border-blue-400 p-2">seates</td>
                                <td class="border-r border-blue-400 p-2">luggage places</td>
                                <td class="border-r border-blue-400 p-2">description</td>
                                <td class="border-r border-blue-400 p-2">status</td>
                                <td class="p-2">quick actions</td>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr class="p-2 border-b border-b-blue-400" v-for="car in cars" :key="car.id">
                                <td class="border-r border-blue-400 p-2">{{ car.id }}</td>
                                <td class="border-r border-blue-400 p-2">{{ car.name }}</td>
                                <td class="border-r border-blue-400 p-2">{{ car.image }}</td>
                                <td class="border-r border-blue-400 p-2">{{ car.seates }}</td>
                                <td class="border-r border-blue-400 p-2">{{ car.luggage_place }}</td>
                                <td class="border-r border-blue-400 p-2">{{ car.description }}</td>
                                <td class="border-r border-blue-400 p-2">{{ car.status }}</td>
                                <td class=" flex p-2">
                                    <span class="cursor-pointer" @click="showSingleCar( car.id )"><i class="fa fa-eye text-xl text-blue-400 mr-2"></i></span>
                                    <span  class="cursor-pointer" @click="deleteCar( car.id )"><i class="fa fa-trash text-xl text-red-500 cursor-pointer"></i></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- showing a single car model -->
        <div 
            class="w-11/12 md:w-8/12 bg-white border-blue-400 top-0 mt-5 md:mt-20  p-20"
            :class="[
                showSingleCarModel ? 'absolute' : 'hidden',
            ]"
            >
            <div class="border-b-blue-200 mb-10">
                <div class="flex justify-between mb-5">
                <p class="text-xl font-bold ">Car <span class="ml-2">{{ singleCar.name }}</span> </p>
                <p class="cursor-pointer" @click="()=>{this.showSingleCarModel = !this.showSingleCarModel; this.singleCar = {}}"><i class="fa fa-times text-blue-700 text-3xl"></i></p>
                </div>
                <p >{{ singleCar.name }}</p>
                
            </div>
            <div class=" mb-10">
                <h3>Car info</h3>
                <div>
                    <p>Car image : {{ singleCar.image }}</p>
                    <p>Car Seates: {{ singleCar.seates }}</p>
                    <p>Car luggage: {{ singleCar.luggage_place }}</p>
                    <p>Car status: {{ singleCar.status }}</p>
                    <p>Car description: {{ singleCar.description }}</p>
                </div>
            </div>
            <div>
                <h3>Quick actions</h3>
                <div class="flex justify-items-start pt-10">
                    <button type="submit" class="p-2 rounded-md mr-3 text-md font-light border-2 border-red-600 text-red-600" @click="deleteCar(singleCar.id)">Delete</button>
                    <button class="p-2 rounded-md mr-3 text-md font-light border-2 border-green-600 text-green-600" @click="editModalWindow(singleCar);">Edit</button>
                </div>
            </div>
        </div>
        <!-- Cars saving form  -->
        <div 
            class="w-11/12 md:w-8/12 bg-white border-blue-400 top-0 mt-5 md:mt-20  p-20"
            :class="[
                addCarModel ? 'absolute' : 'hidden',
            ]"
            >
            <h2 class="text-2xl font-bold mb-4">Add a car</h2>
            <div class="border-b-blue-200 mb-10">
                <form @submit.prevent="editMode? updateCar() : saveCar()">
                    <div class="flex justify-between mb-2">
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.name" name="name" placeholder="name"/>
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.image" name="image" placeholder="image"/>
                    </div>
                    <div class="flex justify-between mb-2">
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.seates" name="seates" placeholder="seates"/>
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.luggage_place" name="luggage_place" placeholder="luggage place"/>
                    </div>
                    <div class="flex justify-between mb-2">
                        <div class="w-5/12">
                            <label class="text-md pb-2"> Car available now?</label>
                            <input class="text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="checkbox" v-model="form.status" name="status" placeholder="status"/>
                        </div>
                        <div class="w-5/12">
                            <label class="text-md pb-2">Car sample description</label>
                            <textarea class=" text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" v-model="form.description" name="description">description</textarea>
                        </div>
                    </div>
                    <div class="flex justify-items-start pt-10">
                        <button type="submit" v-show="!editMode" class="p-2 rounded-md mr-3 text-md font-light border-2 border-blue-600 text-blue-600" >Save</button>
                        <button type="submit" v-show="editMode" class="p-2 rounded-md mr-3 text-md font-light border-2 border-green-600 text-green-600" >Update</button>
                        <button class="p-2 rounded-md mr-3 text-md font-light border-2 border-red-600 text-red-600" @click="()=>{this.addCarModel = false}">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "car",
    data() {
        return {
            cars: {},
            addCarModel:false,
            showsingleCarModel:false,
            singleCar: {},
            editMode:false,
            form: new Form({
                    car_id: '',
                    name: '',
                    description : '',
                    image: '',
                    seates: '',
                    luggage_place: '',
                    status: '',
                }),
        }
    },
    methods: {
            allcars() {
                axios.get("/api/cars").then( data => (this.cars = data.data))
             },
            deleteCar(id) {
                 Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(response=>{
                    if (response.isConfirmed) {
                    this.allcars();
                    axios.delete("/api/cars/"+ id)
                        .then( 
                            (response) => {
                                Swal.fire(
                                    'Deleted!',
                                    'Car deleted successfully',
                                    'success'
                                    )
                        this.allcars()
                        if (this.showSingleCarModel) {
                            this.showSingleCarModel = !this.showSingleCarModel
                        }
                        }) 
                        .catch(() => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>Why do I have this issue?</a>'
                            })
                        })
                }
                })
             },
            showSingleCar(id) {
                this.showSingleCarModel = !this.showSingleCarModel,
                axios.get("/api/cars/"+id).then( data=>(this.singleCar = data.data[0] ))
             },
            saveCar(){
                this.$Progress.start()
                this.form.post('/api/cars')
                    .then(() => {
                        Fire.$emit('AfterCreatedUserLoadIt'); //custom events
                        Toast.fire({
                            icon: 'success',
                            title: 'Car created successfully'
                        })
                        this.$Progress.finish()
                    })
                    .catch((error) => {
                    console.log(error.message)
                    })
             },     
            created() { 
                this.allcars();

                Fire.$on('AfterCreatedUserLoadIt',()=>{ //custom events fire on
                    this.allcars();
                });
             },
            editModalWindow(singleCar){
                this.form.clear();
                this.editMode = true;
                this.addCarModel = true;
                this.showSingleCarModel = false;
                this.form.reset();
                this.form.fill(singleCar)
                this.form.car_id = this.singleCar.id
             },
            updateCar(){
             this.form.put('/api/cars/'+this.form.car_id)
                .then(()=>{

                    Toast.fire({
                        icon: 'success',
                        title: 'Car updated successfully'
                        })
                        Fire.$emit('AfterCreatedUserLoadIt');

                })
                .catch((error)=>{
                    console.log(error.message)
                })
             },
        },
     beforeMount(){
         this.allcars()
     },
}
</script>
<style scoped>

</style>

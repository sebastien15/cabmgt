<template>
    <div>    
        <div class="">
            <button class="border border-blue-500 p-2 text-md rounded-md mr-4" @click="()=>{this.addRouteModel = !this.addRouteModel}">Add a route</button>
            <pre>To add a station you need to choose the route first</pre>
        </div>
        <div class="flex justify-around">
            <div class="w-1/2 p-2 md:pt-20 ">
                <h2 class="text-2xl font-bold" @click="allstations()"><u>All routes</u></h2>
                <br>
                <div class="overflow-x-auto">
                    <table class="border border-blue-400 ">
                        <thead class="border border-blue-400 ">
                            <tr class="p-2 text-sm font-bold">
                                <td class="border-r border-blue-400 p-2">id</td>
                                <td class="border-r border-blue-400 p-2">pickup</td>
                                <td class="border-r border-blue-400 p-2">pickup Post code</td>
                                <td class="border-r border-blue-400 p-2">Destination</td>
                                <td class="border-r border-blue-400 p-2">Destination post code</td>
                                <td class="p-2">quick actions</td>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr class="p-2 border-b border-b-blue-400" v-for="route in routes" :key="route.id">
                                <td class="border-r border-blue-400 p-2">{{ route.id }}</td>
                                <td class="border-r border-blue-400 p-2">{{ route.from }}</td>
                                <td class="border-r border-blue-400 p-2">{{ route.from_post_code }}</td>
                                <td class="border-r border-blue-400 p-2">{{ route.to }}</td>
                                <td class="border-r border-blue-400 p-2">{{ route.to_post_code }}</td>
                                <td class=" flex p-2">
                                    <span class="cursor-pointer" @click="showSingleRoute( route.id )"><i class="fa fa-eye text-xl text-blue-400 mr-2"></i></span>
                                    <span  class="cursor-pointer" @click="deleteRoute( route.id )"><i class="fa fa-trash text-xl text-red-500 cursor-pointer"></i></span>
                                    <span  class="cursor-pointer text-xs text-blue-800 ml-2 p-1 border border-blue-400" @click="allStations(route.id)">show stations</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="w-1/2 p-2 md:pt-20"> 
                <h2 class="text-2xl font-bold cursor-pointer" @click="allStations(0)"><u>All Stations</u></h2>
                <pre>click on a route to see associated stations</pre>
                <div class="overflow-x-auto">
                    <table class="border border-blue-400 ">
                        <thead class="border border-blue-400 ">
                            <tr class="p-2 text-sm font-bold">
                                <td class="border-r border-blue-400 p-2">id</td>
                                <td class="border-r border-blue-400 p-2">Pickup</td>
                                <td class="border-r border-blue-400 p-2">Pickup post code</td>
                                <td class="border-r border-blue-400 p-2">drop off</td>
                                <td class="border-r border-blue-400 p-2">drop off post code</td>
                                <td class="p-2">quick actions</td>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr class="p-2 border-b border-b-blue-400" v-for="station in stations" :key="station.id">
                                <td class="border-r border-blue-400 p-2">{{ station.id }}</td>
                                <td class="border-r border-blue-400 p-2">{{ station.from }}</td>
                                <td class="border-r border-blue-400 p-2">{{ station.from_postcode }}</td>
                                <td class="border-r border-blue-400 p-2">{{ station.to }}</td>
                                <td class="border-r border-blue-400 p-2">{{ station.to_postcode }}</td>
                                <td class="flex p-2">
                                    <span class="cursor-pointer" @click="showSingleStation( station.id )"><i class="fa fa-eye text-xl text-blue-400 mr-2"></i></span>
                                    <span  class="cursor-pointer" @click="deleteStation( station.id )"><i class="fa fa-trash text-xl text-red-500 cursor-pointer"></i></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- showing a single route model -->
        <div 
            class="w-11/12 md:w-8/12 bg-white border-blue-400 top-0 mt-5 md:mt-20  p-20"
            :class="[
                showSingleRouteModel ? 'absolute' : 'hidden',
            ]"
            >
            <div class="border-b-blue-200 mb-10">
                <div class="flex justify-between mb-5">
                <p class="text-xl font-bold ">Route <span class="ml-2">{{ singleRoute.id }}</span> </p>
                <p class="cursor-pointer" @click="()=>{this.showSingleRouteModel = !this.showSingleRouteModel; this.singleRoute = {}}"><i class="fa fa-times text-blue-700 text-3xl"></i></p>
                </div>
                <p >{{ singleRoute.from }} to {{ singleRoute.to }}</p>
                <p >{{ singleRoute.from_post_code }} to {{ singleRoute.to_post_code }}</p>
            </div>
            <div class=" mb-10">
                <h3>Route info</h3>
                <div>
                    <p>Route Kilometers : {{ singleRoute.kilometers }}</p>
                    <p>Route Price: {{ singleRoute.price }}</p>
                    <p>Route Predicted time: {{ singleRoute.time }}</p>
                </div>
            </div>
            <div>
                <h3>Quick actions</h3>
                <div class="flex justify-items-start pt-10">
                    <button type="submit" class="p-2 rounded-md mr-3 text-md font-light border-2 border-red-600 text-red-600" @click="deleteRoute(singleRoute.id)">Delete</button>
                    <button class="p-2 rounded-md mr-3 text-md font-light border-2 border-green-600 text-green-600" @click="editModalWindow(singleRoute);">Edit</button>
                    <button class="p-2 rounded-md mr-3 text-md font-light border-2 border-red-600 text-red-600" @click="()=>{this.addStationModel = true; this.form.route_id = singleRoute.id}">Add Station</button>
                </div>
            </div>
        </div>
        <!-- showing a single station model -->
        <div 
            class="w-11/12 md:w-8/12 bg-white border-blue-400 top-0 mt-5 md:mt-20  p-20"
            :class="[
                showSingleStationModel ? 'absolute' : 'hidden',
            ]"
            >
            <div class="border-b-blue-200 mb-10">
                <div class="flex justify-between mb-5">
                <p class="text-xl font-bold ">Station <span class="ml-2">{{ singleStation.id }}</span> </p>
                <p class="cursor-pointer" @click="()=>{this.showSingleStationModel = !this.showSingleStationModel; this.singleStation = {}}"><i class="fa fa-times text-blue-700 text-3xl"></i></p>
                </div>
                <p >{{ singleStation.from }} to {{ singleStation.to }}</p>
                <p >{{ singleStation.from_postcode }} to {{ singleStation.to_postcode }}</p>
                <h5 class="text-sm font-semibold my-2">Main road</h5>
                <p>{{singleStation.route_id}}</p>
            </div>
            <div class=" mb-10">
                <h3 class="text-xl font-semibold">Route info</h3>
                <div>
                    <p>Route Kilometers : {{ singleStation.kilometers }}</p>
                    <p>Route Price: {{ singleStation.price }}</p>
                    <p>Route Predicted time: {{ singleStation.time }}</p>
                </div>
            </div>
            <div>
                <h3>Quick actions</h3>
                <div class="flex justify-items-start pt-10">
                    <button type="submit" class="p-2 rounded-md mr-3 text-md font-light border-2 border-red-600 text-red-600" @click="deleteStation(singleStation.id)">Delete</button>                    
                    <button class="p-2 rounded-md mr-3 text-md font-light border-2 border-green-600 text-green-600" @click="editStationModalWindow(singleStation);">Edit</button>
                    <button class="p-2 rounded-md mr-3 text-md font-light border-2 border-red-600 text-red-600">Close window</button>
                </div>
            </div>
        </div>
        <!-- Routes saving form  -->
        <div 
            class="w-11/12 md:w-8/12 bg-white border-blue-400 top-0 mt-5 md:mt-20  p-20"
            :class="[
                addRouteModel ? 'absolute' : 'hidden',
            ]"
            >
            <h2 class="text-2xl font-bold mb-4">Add a route</h2>
            <div class="border-b-blue-200 mb-10">
                <form @submit.prevent="editMode? updateRoute() : saveRoute()">
                    <div class="flex justify-between mb-2">
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.from" name="from" placeholder="Pickup name"/>
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.from_post_code" name="from_post_code" placeholder="Pickup post code"/>
                    </div>
                    <div class="flex justify-between mb-2">
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.to" name="to" placeholder="Drop off name"/>
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.to_post_code" name="to_post_code" placeholder="Drop off post code"/>
                    </div>
                    <div class="flex justify-between mb-2">
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.kilometers" name="kilometers" placeholder="Kilometers"/>
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.time" name="time" placeholder="time in minutes"/>
                    </div>
                    <div class="flex justify-between mb-2">
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.price" name="price" placeholder="Price"/>
                    </div>
                    <div class="flex justify-items-start pt-10">
                        <button type="submit" v-show="!editMode" class="p-2 rounded-md mr-3 text-md font-light border-2 border-blue-600 text-blue-600" >Save</button>
                        <button type="submit" v-show="editMode" class="p-2 rounded-md mr-3 text-md font-light border-2 border-green-600 text-green-600" >Update</button>
                        <button class="p-2 rounded-md mr-3 text-md font-light border-2 border-red-600 text-red-600" @click="()=>{this.addRouteModel = false}">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Station saving form -->
        <div 
            class="w-11/12 md:w-8/12 bg-white border-blue-400 top-0 mt-5 md:mt-20  p-20"
            :class="[
                addStationModel ? 'absolute' : 'hidden',
            ]"
            >
            <h2 class="text-2xl font-bold mb-4">Add a Station</h2>
            <div class="border-b-blue-200 mb-10">
                <form @submit.prevent="editStationMode? updateStation() : saveStation()">
                    <div class="flex justify-between mb-2">
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.from" name="from" placeholder="Pickup name"/>
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.from_postcode" name="from_post_code" placeholder="Pickup post code"/>
                    </div>
                    <div class="flex justify-between mb-2">
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.to" name="to" placeholder="Drop off name"/>
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.to_postcode" name="to_post_code" placeholder="Drop off post code"/>
                    </div>
                    <div class="flex justify-between mb-2">
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.kilometers" name="kilometers" placeholder="Kilometers"/>
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.time" name="time" placeholder="time in minutes"/>
                    </div>
                    <div class="flex justify-between mb-2">
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.price" name="price" placeholder="Price"/>
                        <input class="hidden" type="hidden" v-model="form.route_id" name="route_id" value="1"/>
                    </div>
                    <div class="flex justify-items-start pt-10">
                        <button type="submit" v-show="!editStationMode" class="p-2 rounded-md mr-3 text-md font-light border-2 border-red-600 text-red-600" >Save</button>
                        <button type="submit" v-show="editStationMode" class="p-2 rounded-md mr-3 text-md font-light border-2 border-green-600 text-green-600" >Update</button>
                        <button class="p-2 rounded-md mr-3 text-md font-light border-2 border-red-600 text-red-600" @click="()=>{this.addStationModel = false}">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "routesandstations",
    data() {
        return {
            routes: {},
            stations:{},
            addRouteModel:false,
            addStationModel:false,
            showSingleRouteModel:false,
            showSingleStationModel:false,
            singleRoute: {},
            singleStation: {},
            singleRouteEmpty: false,
            editMode:false,
            editStationMode:false,
            form: new Form({
                    route_id: '',
                    from : '',
                    from_post_code: '',
                    from_postcode: '',
                    to: '',
                    to_post_code: '',
                    to_postcode: '',
                    kilometers: '',
                    price: '',
                    time: '',
                }),
        }
    },
    methods: {
            allroutes() {
                axios.get("/api/routes").then( data => (this.routes = data.data))
             },
            allStations(routeId) {
                if (routeId == 0) {
                    axios.get("/api/stations").then( data => (this.stations = data.data))
                }else{
                    try {
                        axios.get("/api/stationsByRouteId/" + routeId).then( (data)=>{
                                if (data.status == 200) {
                                    this.stations = data.data
                                }else{
                                    console.log('not station found')
                                }
                            }
                        )
                    } catch (error) {
                        console.log(error.message)
                    }
                }
             },
            deleteRoute(id) {
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
                    this.destroyStationByRouteId(id)
                    this.allStations();
                    axios.delete("/api/routes/"+ id)
                        .then( 
                            (response) => {
                                Swal.fire(
                                    'Deleted!',
                                    'Route deleted successfully',
                                    'success'
                                    )
                        this.allroutes()
                        if (this.showSingleRouteModel) {
                            this.showSingleRouteModel = !this.showSingleRouteModel
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
            deleteStation(id){
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
                    this.destroyStationByRouteId(id)
                    axios.delete("/api/stations/"+ id)
                        .then( 
                            (response) => {
                                Swal.fire(
                                    'Deleted!',
                                    'Station deleted successfully',
                                    'success'
                                    )
                        this.allStations()
                        // if (this.showSingleRouteModel) {
                        //     this.showSingleRouteModel = !this.showSingleRouteModel
                        // }
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
            showSingleRoute(id) {
                this.showSingleRouteModel = !this.showSingleRouteModel,
                axios.get("/api/routes/"+id).then( data=>(this.singleRoute = data.data[0] ))
             },
            showSingleStation(id) {
                this.showSingleStationModel = !this.showSingleStationModel,
                axios.get("/api/stations/"+id).then( data=>(this.singleStation= data.data[0] ))
             },
            destroyStationByRouteId(routeId){
                try {
                    axios.delete("/api/stationDestroyByRouteId/"+routeId)
                } catch (error) {
                    console.log(error.message)
                }
             },
            saveRoute(){
                this.$Progress.start()

                this.form.post('/api/routes')
                    .then(() => {
                        Fire.$emit('AfterCreatedUserLoadIt'); //custom events
                        Toast.fire({
                            icon: 'success',
                            title: 'Route created successfully'
                        })
                        this.$Progress.finish()
                    })
                    .catch(() => {
                    console.log("Error......")
                    })
             },     
            saveStation(){
                this.$Progress.start()
                console.log(this.form)
                this.form.post('/api/stations')
                    .then(() => {
                        Fire.$emit('AfterCreatedUserLoadIt'); //custom events
                        Toast.fire({
                            icon: 'success',
                            title: 'Station created successfully'
                        })
                        this.$Progress.finish()
                    })
                    .catch((error) => {
                    console.log(error.message)
                    })
             },      
            created() { 
                this.allroutes();
                this.allStations();

                Fire.$on('AfterCreatedUserLoadIt',()=>{ //custom events fire on
                    this.allroutes();
                    this.allStations();
                });
             },
            editModalWindow(singleRoute){
                this.form.clear();
                this.editMode = true;
                this.addRouteModel = true;
                this.showSingleRouteModel = false;
                this.form.reset();
                this.form.fill(singleRoute)
                this.form.route_id = this.singleRoute.id
             },
            updateRoute(){
             this.form.put('/api/routes/'+this.form.route_id)
                .then(()=>{

                    Toast.fire({
                        icon: 'success',
                        title: 'Route updated successfully'
                        })
                        Fire.$emit('AfterCreatedUserLoadIt');

                })
                .catch((error)=>{
                    console.log(error.message)
                })
             },
            editStationModalWindow(singleStation){
                this.form.clear();
                this.editStationMode = true;
                this.addStationModel = true;
                this.showSingleStationModel = false;
                this.form.reset();
                this.form.fill(singleStation)
                this.form.route_id = this.singleStation.id
             },
            updateStation(){
             this.form.put('/api/stations/'+this.form.route_id)
                .then(()=>{

                    Toast.fire({
                        icon: 'success',
                        title: 'Station updated successfully'
                        })
                        Fire.$emit('AfterCreatedUserLoadIt');

                })
                .catch((error)=>{
                    console.log(error.message)
                })
             },
        },
     beforeMount(){
         this.allroutes()
         this.allStations(0)
     },
}
</script>
<style scoped>

</style>


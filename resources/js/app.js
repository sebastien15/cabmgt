window.Vue = require('vue');

require('./bootstrap');

//Import Vue Filter
require('./filter'); 

//Import progressbar
require('./progressbar'); 

//Setup custom events 
require('./customEvents'); 

//Import Sweetalert2
import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast = Toast

//Import v-from
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)



Vue.component('base-nav', require('./components/UI/BaseNav').default);
Vue.component('base-header', require('./components/UI/BaseHeader').default);
Vue.component('base-panel', require('./components/UI/BasePanel').default);
Vue.component('base-input', require('./components/UI/BaseInput').default);
Vue.component('base-button', require('./components/UI/BaseButton').default);
Vue.component('base-sidebar', require('./components/UI/BaseSidebar').default);
Vue.component('base-footer', require('./components/front/BaseFooter').default);
Vue.component('about-page', require('./components/front/aboutPage').default);
Vue.component('contactus-page', require('./components/front/contactusPage').default);
Vue.component('offers-page', require('./components/front/offersPage').default);
Vue.component('values-page', require('./components/front/valuesPage').default);
Vue.component('siteMap-page', require('./components/front/siteMapPage').default);
Vue.component('banner', require('./components/front/home/banner').default);
Vue.component('offers', require('./components/front/home/offers').default);
Vue.component('promise', require('./components/front/home/promise').default);
Vue.component('safety', require('./components/front/home/safety').default);
Vue.component('research', require('./components/front/booking/research').default);
Vue.component('book-header', require('./components/front/booking/bookheader').default);
Vue.component('no-cab', require('./components/front/booking/noCab').default);
Vue.component('cab-list', require('./components/front/booking/cabList').default);
Vue.component('operatordashboard', require('./components/admin/operator/dashboard').default);
Vue.component('routesandstations', require('./components/admin/operator/routesAndStations').default);
Vue.component('car', require('./components/admin/superAdmin/car').default);
Vue.component('register', require('./components/auth/register').default);
Vue.component('login', require('./components/auth/login').default);

const app = new Vue({
    el: '#app',
});

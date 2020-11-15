require('./bootstrap');

window.Vue = require('vue');

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

const app = new Vue({
    el: '#app',
});

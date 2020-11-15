require('./bootstrap');

window.Vue = require('vue');

Vue.component('base-nav', require('./components/UI/BaseNav').default);
Vue.component('base-header', require('./components/UI/BaseHeader').default);
Vue.component('base-panel', require('./components/UI/BasePanel').default);
Vue.component('base-input', require('./components/UI/BaseInput').default);
Vue.component('base-sidebar', require('./components/UI/BaseSidebar').default);
Vue.component('base-footer', require('./components/front/BaseFooter').default);
Vue.component('about-page', require('./components/front/aboutPage').default);
Vue.component('contactus-page', require('./components/front/contactusPage').default);

const app = new Vue({
    el: '#app',
});

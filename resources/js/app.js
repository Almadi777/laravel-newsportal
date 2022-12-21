require('./bootstrap');
window.Vue = require('vue').default;

Vue.component('header', require('./components/Header.vue').default);
Vue.component('test', require('./components/Test.vue').default);

const app = new Vue({
    el: '#app',
});
export default {
    components: {
        Test: Test
    }
}

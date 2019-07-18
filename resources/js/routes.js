import Vue          from 'vue';
import VueRouter    from 'vue-router';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'hash',
    routes : [
        {
            path: '/',
            name: 'index',
            component: Vue.component('index', require('./pages/Index.vue').default),
        },
        {
            path: '/login',
            name: 'login',
            component: Vue.component('login', require('./pages/Login.vue').default),
        },






    ] // end of routes
}); // end of VueRouter
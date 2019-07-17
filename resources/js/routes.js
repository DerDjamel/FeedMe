import Vue          from 'vue';
import VueRouter    from 'vue-router';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes : [
        {
            path: '/',
            name: 'index',
            component: Vue.component('index', require('./pages/Index.vue').default),
        }






    ] // end of routes
}); // end of VueRouter
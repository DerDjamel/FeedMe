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
            path: '/recipe/:recipeId',
            name: 'single-recipe',
            component: Vue.component('single-recipe', require('./pages/SingleRecipe.vue').default),
            props: true
        },
        {
            path: '/login',
            name: 'login',
            component: Vue.component('login', require('./pages/Login.vue').default),
            meta: { requireGuest: true }
        },
        {
            path: '/register',
            name: 'register',
            component: Vue.component('register', require('./pages/Register.vue').default),
            meta: { requireGuest: true }
        },

        


    ], // end of routes

}); // end of VueRouter

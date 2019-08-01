/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuetify  from 'vuetify';
import Store    from './store.js';
import Router   from './routes.js';



Vue.use(Vuetify);
/*
Router.beforeEach((to, from, next) => {
    //console.log(to.meta.requireGuest);
    //console.log(Store.getters.getAuth);
    
    if ( to.meta.requireGuest ){
        if ( !Store.getters.getAuth ){
            next();
        }
        else {
            console.log('this route requires not authenticated');
            next( { path: '/' } );
        }
    }
    //console.log(Store.getters);
    
    next();
});
*/
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('main-navigation', require('./components/MainNavigation.vue').default);
Vue.component('recipe', require('./components/Recipe.vue').default);
Vue.component('review', require('./components/Review.vue').default);

const app = new Vue({
    el      : '#app',
    store   : Store,
    router  : Router,
});

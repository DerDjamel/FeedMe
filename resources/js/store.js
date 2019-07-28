import Vue  from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import UserModule   from './modules/user.js';
import RecipeModule from './modules/recipe.js';
import ReviewModule from './modules/review.js';

export default new Vuex.Store({
    modules: {
        user    : UserModule,
        recipe  : RecipeModule,
        review  : ReviewModule
    }
});
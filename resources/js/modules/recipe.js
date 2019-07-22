import RecipeApi from '../api/recipe.js';

export default {
    state: {
        recipes: [],
        recipe: {}
    },/* END of state */


    actions: {
        loadAllRecipes({ commit }){
            RecipeApi.index().then( ({ data }) => {
              commit('setRecipes', data);
            } );
        },

        loadRecipe({ commit }, id){
            RecipeApi.show(id).then( ({ data }) => {
                commit('setRecipe', data);
            } );
        },
        
        destroyRecipe({ commit, state }, id){
            RecipeApi.destroy(id).then( res => {
                if( id == state.recipe.id ){
                    commit('setRecipe', {});
                }
                commit('deleteRecipe', id);
            } );
        },

        storeRecipe({ commit }, recipe){
            RecipeApi.store(recipe).then( ({ data }) => {
                commit('addRecipe', data);
            });
        }
    },/* END of actions */


    mutations: {
        setRecipes(state, recipes){
            state.recipes = recipes;
        },

        setRecipe(state, recipe){
            state.recipe = recipe;
        },

        deleteRecipe(state, id){
            state.recipes = state.recipes.filter( recipe => recipe.id != id );
        },

        addRecipe(state, recipe){
            state.recipes.push(recipe);
        }
    }, /* End of mutations */


    getters: {
        getRecipes(state){
            return state.recipes;
        },

        getRecipe(state){
            return state.recipe;
        }
    }/* End of getters */ 


}
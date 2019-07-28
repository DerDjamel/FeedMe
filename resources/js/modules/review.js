import ReviewApi from '../api/review.js';


export default {
    state: {
        
    },/* END of state */


    actions: {
        storeReview( { commit }, review ){
            ReviewApi.store(review).then( ({ data }) => {
                commit('addReview', data);
            } );
        },

        updateReview( { commit }, review ){
            ReviewApi.update(review.id).then(({ data }) => {
                commit('updateReview', data);
            } );
        },

        destroyReview({ commit }, reviewId){
            ReviewApi.destroy(reviewId).then( ({ data }) => {
                commit('deleteReview', reviewId);
            } );
        }
    },/* END of actions */


    mutations: {
        addReview(state, review){
            let index = state.recipes.findIndex( recipe => recipe.id == review.recipe_id );
            state.recipe[index].reviews.push(review);
        },

        updateReview(state, review){
            let recipeIndex     = state.recipes.findIndex( recipe => recipe.id == review.recipe_id );

            let reviews         = state.recipe[recipeIndex].reviews;
            let reviewIndex     = reviews.findIndex( r => r.id == review.id);

            state.recipe[recipeIndex].reviews[reviewIndex] = review;
        },

        deleteReview(state, reviewId){
            let index = state.recipes.findIndex( recipe => recipe.id == review.recipe_id );
            state.recipe[index].reviews.push(review);
            let i = 0;
            while( i < state.recipes.length ){
                let reviews = state.recipes[i].reviews;
                let index   = reviews.findIndex( review => review.id == reviewId);

                if(index != -1){
                    state.recipes[i].reviews.pop(index);
                    break;
                }
                i++;
            }
        },

    }, /* End of mutations */


    getters: {
        
    }/* End of getters */ 


}
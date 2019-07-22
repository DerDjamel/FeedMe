
export default {
    index(){
        return axios.get('/api/recipes');
    },

    store(recipe){
        return  axios.post('/api/recipe', recipe);
    },

    show(recipeID){
        return axios.get(`/api/recipe/${recipeID}`);
    },

    destroy(recipeID){
        return axios.delete(`/api/recipe/${recipeID}`);
    },

}
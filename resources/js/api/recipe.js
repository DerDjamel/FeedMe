
export default {
    index(){
        return axios.get('/api/recipes');
    },

    store(recipe){
        return  axios.post('/api/recipe', recipe);
    },

    update(recipe){
        return axios.put(`/api/recipe/${recipe.id}`, recipe);
    },

    show(recipeID){
        return axios.get(`/api/recipe/${recipeID}`);
    },

    destroy(recipeID){
        return axios.delete(`/api/recipe/${recipeID}`);
    },

}
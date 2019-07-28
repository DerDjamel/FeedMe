
export default {
    store(review){
        return  axios.post('/api/review', recipe);
    },

    update(review){
        return axios.put(`/api/review/${review.id}`, review);
    },

    show(reviewID){
        return axios.get(`/api/review/${reviewID}`);
    },

    destroy(reviewID){
        return axios.delete(`/api/review/${reviewID}`);
    },

}
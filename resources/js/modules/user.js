import UserApi from '../api/user.js';

export default {
    state: {
        user: ''
    },/* END of state */


    actions: {
        loadUser({ commit }){
            UserApi.getUser().then( res => {
                commit('setUser', res.data);
            });
        },
    },/* END of actions */


    mutations: {
        setUser(state, user){
            state.user = user;
        }
    }, /* End of mutations */


    getters: {
        getUser(state){
            return state.user;
        }
    }/* End of getters */ 


}
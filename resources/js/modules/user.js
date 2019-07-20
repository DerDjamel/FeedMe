import UserApi from '../api/user.js';

export default {
    state: {
        user: '',
        auth: false
    },/* END of state */


    actions: {
        loadUser({ commit }, user = null){
            if ( user == null ){
                UserApi.getUser().then( res => {
                    commit('setUser', res.data);
                });
            }
            commit('setUser', user);
            commit('setAuth', true);
        },

        logoutUser({ commit }){
            commit('setUser', {});
            commit('setAuth', false);
        }
    },/* END of actions */


    mutations: {
        setUser(state, user){
            state.user = user;
        },

        setAuth(state, authState){
            state.auth = authState;
        },
    }, /* End of mutations */


    getters: {
        getUser(state){
            return state.user;
        },

        getAuth(state){
            return state.auth;
        }
        
    }/* End of getters */ 


}
export default {
    login (credentials) {
        return axios.post('/login', credentials);
    },

    logout () {
        return axios.post('/logout');
    },

    register (user) {
        return axios.post('/register', user);
      },
}
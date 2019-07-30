<template>
    
        <v-layout justify-center align-center column>
            <v-flex xs12 md8 mb-3 text-xs-center>
                <h2 >Register Page</h2>
            </v-flex>

            <v-divider></v-divider>

            <v-flex my-2 pa-2 xs6>
                <v-form  ref="loginForm">
                        <v-layout justify-center align-center column>
                            <v-flex>
                                <v-text-field v-model="name" name="name" type="text" label="name" autofocus clearable></v-text-field>
                            </v-flex>

                            <v-flex>
                                <v-text-field v-model="email" name="email" type="email" label="e-mail" autofocus clearable></v-text-field>
                            </v-flex>

                            <v-flex>
                                <v-text-field v-model="password" name="password" type="password" label="password" clearable></v-text-field>
                            </v-flex>

                            <v-flex>
                                <v-text-field v-model="password_confirmation" name="password_confirmation" type="password" label="password confirmation" clearable></v-text-field>
                            </v-flex>

                        </v-layout>
                </v-form>
            </v-flex>

            <v-flex xs12>
                <v-btn color="success" @click="register">Register</v-btn>
                <v-btn color="warning" @click="reset">reset</v-btn>
            </v-flex>

        </v-layout>
    
</template>

<script>
import Auth from '../api/auth.js';
export default {
    data(){
        return {
            name        : '',
            email       : '',
            password    : '',
            password_confirmation: '',

            errors: {},
        };
    },

    methods: {
        /* reset the form */
        reset(){
            this.$refs.loginForm.reset();
        },

        register(){
            Auth.register({
                name        : this.name,
                email       : this.email,
                password    : this.password,
                password_confirmation: this.password_confirmation
            }).then( ({ data }) => {
                console.log(data);
                this.$store.dispatch('loadUser');
                window.location = '/';
            }).catch( err => {
                console.log(err.response.data);
            });
        }

    },
}
</script>

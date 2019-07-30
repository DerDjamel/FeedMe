<template>
    
        <v-card>
            <v-layout justify-center align-center column>
                <v-flex xs12 md8 mb-3 text-xs-center>
                    <h2 >Login Page</h2>
                </v-flex>

                <v-divider></v-divider>

                <v-flex my-2 pa-2 xs6>
                    <v-form  ref="loginForm">
                            <v-layout justify-center align-center column>
                                <v-flex>
                                    <v-text-field v-model="email" name="email" type="email" label="e-mail" autofocus clearable></v-text-field>
                                </v-flex>

                                <v-flex>
                                    <v-text-field v-model="password" name="password" type="password" label="password" clearable></v-text-field>
                                </v-flex>

                            </v-layout>
                    </v-form>
                </v-flex>

                <v-flex xs12>
                    <v-btn color="success" @click="login">Log in</v-btn>
                    <v-btn color="warning" @click="reset">reset</v-btn>
                </v-flex>
            </v-layout>
        </v-card>

</template>

<script>
import Auth from '../api/auth.js';
export default {
    data(){
        return {
            email       : '',
            password    : '',

            errors: {},
        };
    },

    methods: {
        /* reset the form */
        reset(){
            this.$refs.loginForm.reset();
        },

        login(){
            Auth.login({
                email       : this.email,
                password    : this.password
            }).then( res => {
                // 1 - dispatch loadUser to set the user information and auth to true
                // 2 - then redirect to the index of the app
                this.$store.dispatch('loadUser');
                window.location = '/';
            } ).catch(error => {
                this.errors = error.response.data;
            });
        }

    },
}
</script>

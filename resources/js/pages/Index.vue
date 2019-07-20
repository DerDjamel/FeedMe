<template>
    <div>
        <h1>This is the index</h1>
        <router-link :to="{ name : 'login' }">
            <v-btn>Login</v-btn>
        </router-link>
        <router-link :to="{ name : 'register' }">
            <v-btn>Register</v-btn>
        </router-link>
    </div>
</template>

<script>
export default {

}
</script>

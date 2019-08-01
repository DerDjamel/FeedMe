<template>
    <v-card>
        <v-layout row align-center justify-space-between>
            <v-flex d-flex justify-center align-center  xs1 my-2 >
                <v-avatar
                    size="40"
                    >
                    <img src="https://vuetifyjs.com/apple-touch-icon-180x180.png" alt="avatar">
                </v-avatar>
            </v-flex>
            
            <v-flex xs11>
                <v-layout column>
                    <v-flex mt-2 pa-1>
                        <h6 class="subheading">{{ user.name }}</h6>
                    </v-flex>
                    <v-flex my-1 pa-1>
                        <p> {{ content }} </p>
                    </v-flex>
                </v-layout>
            </v-flex>
        </v-layout>
    </v-card>
</template>
<script>
export default {
    props: {
        review : {
            type        : Object,
            required    : true
        },
    },
    data() {
        return {
            content : this.review.content,
            id      : this.review.id,
            user    : this.review.user,
            can     : this.review.can || { update: false, delete: false }
        }
    },
}
</script>
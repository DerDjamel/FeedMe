<template>
    <!-- the recipe -->
    <v-card>
        <v-card-title primary-title>
            <div>
                <h3 class="headline mb-0 font-weight-bold"> {{ recipe.title }} </h3>
                <h6 class="subheading mt-1 font-weight-black"> {{ recipe.user.name }} </h6>
            </div>
        </v-card-title>
        
        <v-divider></v-divider>

        <v-card-text>
            <p> {{ recipe.content }} </p>
        </v-card-text>

    
        <v-card-actions>
            <v-btn flat>
                {{ numberOfReviews }}
                <v-icon small>comment</v-icon> 
            </v-btn>

            <v-btn :to="{ name: 'single-recipe', params: { recipeId: id} }">read</v-btn>

            <v-btn v-if="can.update" flat color="blue" @click="dialog = true">update<v-icon right samll color="blue">update</v-icon></v-btn>
            <v-btn v-if="can.delete" flat color="red" @click="destroy">delete <v-icon right samll color="red">delete</v-icon></v-btn>
        </v-card-actions>

        <!-- the recipe update form -->
        <v-dialog max-width="60%" v-model="dialog">
            <v-card>

                <v-card-title>
                    <h2 class="heading"> Update recipe </h2>
                </v-card-title>

                <v-card-text>
                    <v-layout column justify-start>
                        <v-flex xs12 sm8 md6>
                            <v-text-field v-model="title" 
                            clearable 
                            box 
                            autofocus 
                            label="Title" 
                            name="title">
                            </v-text-field>
                        </v-flex>

                        <v-flex xs12 sm8 md6>
                            <v-textarea
                            name="content"
                            label="write your recipe here"
                            auto-grow
                            v-model="content"
                            box
                            ></v-textarea>
                        </v-flex>

                    </v-layout>
                </v-card-text>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-btn dark color="blue" @click="update">Update</v-btn>
                    <v-btn dark color="red" @click="dialog = false">cancel</v-btn>
                </v-card-actions>

            </v-card>
        </v-dialog>

        <div>
            <review v-for="review in recipe.reviews" :key="review.id" :review="review"></review>
        </div>

    </v-card>
</template>

<script>
export default {
    props : {
        recipe : {
            type: Object,
            required: true,   
        },
    },
    data(){
        return {
            id      : this.recipe.id,
            title   : this.recipe.title,
            content : this.recipe.content,
            user    : this.recipe.user,
            reviews : this.recipe.reviews,
            can     : this.recipe.can ||{ update : false, delete: false },

            dialog : false,
        };
    },

    computed: {
        numberOfReviews(){
            return this.recipe.reviews.length;
        } 
    },


    methods: {
        update(){
            this.$store.dispatch('updateRecipe', {  id: this.id, 
                                                    title: this.title, 
                                                    content: this.content});
            this.dialog = false;
        },
        destroy(){
            this.$store.dispatch('destroyRecipe', this.id);
        }
    },
}
</script>

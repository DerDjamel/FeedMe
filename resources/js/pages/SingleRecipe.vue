<template>
    <div>
        <recipe :recipe="getRecipe"></recipe>
    </div>
</template>

<script>
export default {
    props: {
        recipeId: {
            required: true
        }
    },
    data() {
        return {};
    },

    computed: {
        getRecipe(){
            return this.$store.getters.getRecipe;
        }
    },

    created() {
        this.$store.dispatch('loadRecipe', this.recipeId);
    },
}
</script>
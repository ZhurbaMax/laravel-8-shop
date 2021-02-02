<template>
    <button @click="addCartProducts" type="submit" class="btn btn-success">Add card </button>
</template>

<script>
    export default {
        data: function(){
            return{
                product: [],
                quantity: 0,
            }
        },
        methods: {
            addCartProducts(){
            alert('what are you looking at? close immediately!!!');
            }
        },
    }
</script>

<style scoped>

</style>

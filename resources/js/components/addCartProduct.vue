<template>
     <span class="count-header-cart">{{ count }}</span>
</template>

<script>
    export default {
        data() {
            return{
                count: 0,
            }
        },
        mounted() {
            this.getHashtags()
        },
        methods: {
            getHashtags(){
                axios.post('/cart/getCountCart').then(( respons )=>{
                    console.log(respons.data);
                    this.count = respons.data.orderCount;
                });
            },
        },
    }
</script>

<style scoped>

</style>

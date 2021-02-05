<template>
    <div>
        <div class="row">
            <div class="col-xl-12">
                <div class="h2 mt-5 mb-5" > Cart </div>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Number</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in productsVue">
                <td>{{ product.title_product }}</td>
                <td>{{ product.price }} $</td>
                <td><img class="card-img-top cart-img" :src="'storage/'+product.image"></td>
                <th>
                    <i class="fa fa-plus" aria-hidden="true" v-on:click="product.pivot.count ++"> </i>
                    {{ product.pivot.count }}
                    <i class="fa fa-minus" aria-hidden="true" v-on:click="product.pivot.count --"> </i>
                </th>
                <td>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="order-total">
            <p>Order total: <span class="total-price">12000 $</span></p>
            <div class="col-xl-12 right-bott">
                <a class="btn btn-success" href="#">Сheckout</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                productsVue:[],
            }
        },
        mounted() {
            this.getorder()
        },
        methods: {
            getorder(){
                axios.post('/cart').then(( respons )=>{
                    console.log(respons.data);
                    this.productsVue = respons.data.order.products;
                });
            },
        },
    }
</script>

<style scoped>

</style>

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
                <th scope="col">Quantity</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in productsVue">
                <td>{{ product.title_product }}</td>
                <td>{{ product.price * product.pivot.count}} $</td>
                <td><img class="card-img-top cart-img" :src="'storage/'+product.image"></td>
                <th>
                    <input type="number" v-model="product.pivot.count" min="1" max="1000" @click="checkPivot(product)">
                </th>
                <td>
                    <button @click="deleteProduct(product.id)" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="order-total">
            <p>Order total:
                <span class="total-price">{{ cartTotalCost }} $</span>
            </p>
            <div class="col-xl-12 right-bott">
                <a class="btn btn-success" href="/cart/checkout">Сheckout</a>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return{
                productsVue:[],
                orderId: 0,
                productId: 0,
            }
        },
        computed:{
            cartTotalCost(){
                let result = [];
                for (let product of this.productsVue){
                    result.push(product.price * product.pivot.count);
                }
                result = result.reduce(function(sum, el){
                    return sum + el;
                });
                return result;
            }
        },
        watch:{
            productsVue() {
                console.log(1212);
            },
        },
        methods: {
            getorder(){
                axios.post('/cart').then(( respons )=>{
                    console.log(respons.data);
                    this.productsVue = respons.data.order.products;
                    this.orderId = respons.data.order.id;
                });
            },
            checkPivot(product){
                axios.post('/update/cart-vue', {
                    orderId: this.orderId,
                    productsVue: this.productsVue,
                })
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            deleteProduct(id){
                axios.post('/delete/product-vue', {
                    orderId: this.orderId,
                    productId: id,
                })
                    .then((response)=> {
                        console.log(response.data.result);
                        if(response.data.result){
                            this.getorder();
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
        },
        mounted() {
            this.getorder();
        },
    }
</script>

<style scoped>

</style>

<template>
    <div class="">
        <h2>Shopping Cart</h2>
            <div class="card-container">

                <template v-for="product in products" v-bind:key="product.id">
                <article class="card">
                        <img :src="product.associatedModel.image" alt="product.name" class="productimg">
                        <div>
                            <p class="productname" v-text="product.name"></p>
                            <p class="productprice" v-text="formatPrice(product.price)"></p>
                        </div>
                        <div>
                            <button v-on:click.prevent="increase(product.id)"> + </button>
                            
                            <button v-on:click.prevent="decrease(product.id)"> - </button>
                            
                            <button v-on:click.prevent="destroy(product.id)"> supprimer </button>
                           <input type="readonly"
                           :value="product.quantity">
                        </div>
                        <div>
                            <p class="productprice" v-text="formatPrice((product.price * product.quantity))"></p>
                        </div>
                        
                </article>
            </template>
            </div>
    </div>
</template>

<script setup>
import { onMounted } from 'vue';
import useProduct from '../composables/products'
import {formatPrice} from '../helpers'

const {
    products,
    getProducts,
    increaseQuantity,
    decreaseQuantity,
    destroyProduct} = useProduct();

const increase = async(id) => {
    await increaseQuantity(id);
    await getProducts();
}

const decrease = async(id) => {
    await decreaseQuantity(id);
    await getProducts();
}

const destroy = async(id) => {
    await destroyProduct(id);
    await getProducts();
}

onMounted(async() => {
    const products = await getProducts();
    console.log(products);
})

</script>
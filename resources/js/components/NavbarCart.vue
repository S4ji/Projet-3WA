<template>
    <div class="shoppingcart">
        <a href="/shoppingCart" class="relative">
            <span>{{ cartCount }}</span>
            <i class="fa-solid fa-cart-shopping"></i>
        </a>
    </div>
</template>

<script setup >
import { onMounted, ref } from 'vue';
import useProduct from '../composables/products';
import emitter from 'tiny-emitter/instance';


const {getCount} = useProduct();
const cartCount = ref(0);

emitter.on('cartCountUpdated',(count) => cartCount.value = count);

onMounted(async() =>{
  cartCount.value= await getCount();

})

</script>
<template>
    
    <button v-on:click.prevent = "addToCart">Ajouter au panier</button>
    
</template>

<script setup>

import { inject } from 'vue';
import useProduct from '../composables/products';
import emitter from 'tiny-emitter/instance';
const { add } = useProduct();

const productId = defineProps(['productId']);
const toast = inject('toast');  



const addToCart  = async () => {
   await axios.get('/sanctum/csrf-cookie');
   await axios.get('/api/user')
    .then(async(res) => {

      let cartCount = await add(productId);
      emitter.emit('cartCountUpdated', cartCount);
      toast.success('Produit ajouté au panier!');
    })

    .catch(()=>{
      toast.error('Merci de vouloir vous enregistrer.');
      return;
    });
}
</script>
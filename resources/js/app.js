import Alpine from 'alpinejs';
import './bootstrap';
import NavbarCart from './components/NavbarCart.vue';
import AddToCart from './components/AddToCart.vue';
import ShoppingCart from './components/ShoppingCart.vue';


window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue/dist/vue.esm-bundler';
import Toaster from '@meforma/vue-toaster';


const app = createApp();  
app.component('NavbarCart', NavbarCart)
app.component('AddToCart', AddToCart)
app.component('ShoppingCart', ShoppingCart)
app.use(Toaster).provide('toast', app.config.globalProperties.$toast);



app.mount('#app');






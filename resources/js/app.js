require('./bootstrap');

window.Vue = require('vue');

Vue.component('dishes', require('./components/Dishes.vue').default);
Vue.component('cart', require('./components/Cart.vue').default);
Vue.component('cart-checkout', require('./components/CartCheckout.vue').default);
Vue.component('payment', require('./components/Payment.vue').default);

import store from './store.js';

new Vue({
    el: '#app',
    data() {
        return {
            amount: null
        }
    },
    store: new Vuex.Store(store)
});

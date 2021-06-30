require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('cart-dropdown', require('./components/Cart.vue').default);

import store from './store.js';

new Vue({
    el: '#app',

    store: new Vuex.Store(store)
});

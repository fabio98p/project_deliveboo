let store = {
    state: {
        cart: [],
        cartCount: 0,
    },

    mutations: {
      addToCart(state, item) {
        let found = state.cart.find(product => product.id == item.id);

        if (found) {
            found.quantity ++;
            found.totalPrice = found.quantity * found.price;
        } else {
            state.cart.push(item);

            Vue.set(item, 'quantity', 1);
            Vue.set(item, 'totalPrice', item.price);
        }

        state.cartCount++;
      }
    },

    methods: {
        addToCart(item) {
            this.$store.commit('addToCart', item);
        }
    }
};

export default store;

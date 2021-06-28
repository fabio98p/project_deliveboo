let store = {
    state: {
        cart: [],
        cartCount: 0,
    },

    mutations: {
        addToCart:function(state, item) {
            state.cart.push(item);

            state.cartCount++;
        }
    }
};

export default store;

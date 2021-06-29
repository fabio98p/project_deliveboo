let cart = window.localStorage.getItem('cart');
let cartCount = window.localStorage.getItem('cartCount');

let store = {
  state: {
    cart: cart ? JSON.parse(cart) : [],
    cartCount: cartCount ? parseInt(cartCount) : 0,
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

        this.commit('saveCart');
      },

      removeFromCart(state, item) {
        let index = state.cart.indexOf(item);
        
        let found = state.cart.find(product => product.id == item.id);

        if (found && found.quantity > 1) {
            found.quantity --;
            found.totalPrice = found.quantity * found.price;
        } else {
            state.cart.splice(index, 1);
        }

        state.cartCount --


        this.commit('saveCart');
      },

      saveCart(state) {
        window.localStorage.setItem('cart', JSON.stringify(state.cart));
        window.localStorage.setItem('cartCount', state.cartCount);
      },

    },
};

export default store;

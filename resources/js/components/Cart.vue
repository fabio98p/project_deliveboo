<template>
<div class="col-md-4 col-lg-4" id="cart">
  <div class="cart-inner">
    <h3 class="text-center">IL TUO ORDINE</h3>
    <div class="cart-empty text-center mt-3"
    :class="($store.state.cartCount == 0) ? 'd-block' : 'd-none'">
      <h5>Il tuo carello è vuoto!</h5>
    </div>
    <div class="cart-item"
        v-for="item in $store.state.cart"
        :key="item.id">
      <div class="dish-cover">
        <img :src="item.image" :alt="item.name">
        <div class="dish-name ml-3">
          <span>{{item.name}}</span>
          <div class="dish-quantity">
            <i class="fas fa-minus" @click="removeFromCart(item)"></i>
            <span class="ml-1 mr-1">{{ item.quantity }}</span>
            <i class="fas fa-plus" @click="addToCart(item)"></i>
          </div>
        </div>
      </div>
      <div class="dish-price">
        <span>€{{item.totalPrice}}</span>
      </div>
    </div>
    <div class="cart-sum mt-3" :class="($store.state.cartCount != 0) ? 'd-block' : 'd-none'">
      <span>Prodotti nel carello: {{ $store.state.cartCount }}</span>
      <p>Totale: €{{ totalPrice }}</p>
    </div>
    <div class="mt-4 text-center" :class="($store.state.cartCount != 0) ? 'd-block' : 'd-none'">
      <a href="/orders" class="my-button my-button-purple">Vai alla cassa</a>
      <button class="my button my-button-orange mt-3" @click="emptyCart">
          Svuota il carello
      </button><br>
    </div>
  </div>
</div>
</template>



<style>
.removeBtn {
    margin-right: 1rem;
    color: red;
}
</style>

<script>
export default {
  computed: {
    totalPrice() {
        let total = 0;

        for (let item of this.$store.state.cart) {
            total += item.totalPrice;
        }

        return total.toFixed(2);
    }
  },

  methods: {
    addToCart(item) {
      this.$store.commit("addToCart", item);
    },
    removeFromCart(item) {
        this.$store.commit('removeFromCart', item);
    },
    emptyCart() {
        this.$store.commit('emptyCart');
    }
}
}
</script>

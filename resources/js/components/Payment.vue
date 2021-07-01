<template>
  <div class="flex flex-col mx-auto  max-w-lg p-10 justify-middle">
    <div class="text-2xl">
      Stai acquistando il prodotto con id: 
    </div>
    {{ form }}
    <Payment
      ref="paymentRef"
      :authorization="tokenApi"
      @loading="handleLoading"
      @onSuccess="paymentOnSuccess"
      @onError="paymentOnError"
    />

    <button
      v-if="!disableBuyButton"
      class="w-full text-center px-4 py-3 bg-green-500 rounded-md shadow-md text-white font-semibold"
      @click.prevent="beforeBuy"
    >
      Procedi con l'acquisto 🎉
    </button>
    <button
      v-else
      class="w-full text-center px-4 py-3 bg-green-300 rounded-md shadow-md text-white font-semibold cursor-not-allowed"
    >
      {{
        loadingPayment ? 'Loading...' : 'Procedi con l\'acquisto 🎉'
      }}
    </button>
  </div>
</template>

<script>
export default {
  async asyncData ({ app }) {
    let tokenApi = null
    const response = await app.$axios.$get('/api/orders/generate')
    tokenApi = response.token
    return {
      tokenApi,
      loadingPayment: false
    }
  },
  data () {
    return {
      tokenApi: '',
      disableBuyButton: true,
      loadingPayment: true,
      form: {
        token: '',
        product: ''
      }
    }
  },
  mounted () {
    this.form.product = this.$route.params.id
  },
  methods: {
    handleLoading () {
      this.disableBuyButton = false
    },
    paymentOnSuccess (nonce) {
      // alert(nonce);
      this.form.token = nonce
      this.buy()
    },
    // eslint-disable-next-line node/handle-callback-err
    paymentOnError (error) {
    },
    beforeBuy () {
      this.$refs.paymentRef.$refs.paymentBtnRef.click()
    },
    async buy () {
      this.disableBuyButton = true
      this.loadingPayment = true
      try {
        await this.$axios.$post('/api/orders/make/payment', { ...this.form })
        // const message = response.message
        // alert(message)
        this.$router.push({ path: '/checkout/thankyou' })
      } catch (error) {
        this.disableBuyButton = false
        this.loadingPayment = false
      }
    }
  }
}
</script>

<style>
</style>
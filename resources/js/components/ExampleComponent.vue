<template>
  <div class="row">
    <div class="col-md-8 col-lg-8">
      <div class="row">
        <div class="col-md-6 col-lg-6 mt-2 card-outline"
        v-for="item in items"
        :key="item.id">
          <div class="card-personal scale">
            <div
              class="card-personal-cover position-relative"
              :style="`background-image:url('${item.image}')`"
            >
              <div class="card-personal-description">
                <p class="text-center">{{ item.description }}</p>
              </div>
            </div>

            <div class="card-personal-title">
              <h4>{{ item.name }}</h4>
              <div class="dish-price">
                <h5>€{{ item.price.toFixed(2) }}</h5>
                <i
                  class="fas fa-circle"
                  :class="item.available == 1 ? 'text-green' : 'text-red'"
                ></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      id: window.id,
      items: [],
    };
  },
  methods: {
    addToCart(item) {
      this.$store.commit("addToCart", item);
    },
    item() {},
  },
  created() {
    axios
      .get(`http://localhost:8000/api/dishes/${this.id}`)
      .then((response) => {
        console.log(response.data.response);
        var dishes = response.data.response;

        dishes.forEach((dish) => {
          dish.price = parseFloat(dish.price);
          this.items.push(dish);
        });
      });
    //     this.items = [{
    //                 id: 1,
    //                 title: 'Children of Bodom - Hatebreeder',
    //                 price: 9.99
    //             },
    //             {
    //                 id: 2,
    //                 title: 'Emperor - Anthems to the Welkin at Dusk',
    //                 price: 6.66
    //             },
    //             {
    //                 id: 3,
    //                 title: 'Epica - The Quantum Enigma',
    //                 price: 15.99
    //             },
    //             {
    //                 id: 4,
    //                 title: 'Chthonic - Takasago Army',
    //                 price: 14.00
    //             },
    //             {
    //                 id: 5,
    //                 title: 'Silencer - Death - Pierce Me',
    //                 price: 1.20
    //             },
    //             {
    //                 id: 6,
    //                 title: 'My Dying Bride - 34.788%... Complete',
    //                 price: 10.00
    //             },
    //             {
    //                 id: 7,
    //                 title: 'Shape of Despair - Shades of',
    //                 price: 7.80
    //             },
    //             {
    //                 id: 8,
    //                 title: 'Ne Obliviscaris - Portal of I',
    //                 price: 11.30
    //             },
    //             {
    //                 id: 9,
    //                 title: 'Protest the Hero - Fortress',
    //                 price: 5.55
    //             },
    //             {
    //                 id: 10,
    //                 title: 'Dark Lunacy - Devoid',
    //                 price: 6.00
    //             },]
    //
  },
};
</script>

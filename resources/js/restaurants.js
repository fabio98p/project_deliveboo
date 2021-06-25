Vue.config.devtools = true;

var app = new Vue ({
    el: '#root',
    data: {
        scriviTxt: '',
        restaurants: [],
        categories: [],
        searchResultRestaurant:[],
        searchResultDish:[],
        checkClick: false,
    },
    created() {
      axios.get('http://localhost:8000/api/categories').then((response) => {
              this.categories = response.data.response;
          })

      axios.get('http://localhost:8000/api/restaurants').then((response) => {
                this.restaurants = response.data.response;
            })
    },
    methods: {
        checkReverse() {
            this.checkClick = !this.checkClick;
        },
        cerca: function(scriviTxt) {
          axios.get( `http://localhost:8000/api/restaurants?name=` + scriviTxt)
          .then((response) => {
            this.searchResultRestaurant = response.data.results;
          })
            axios.get( `http://localhost:8000/api/restaurant?name=` + scriviTxt)
            .then((response) => {
              this.searchResultDish = response.data.results;
            })
          },
    }
});

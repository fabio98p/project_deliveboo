Vue.config.devtools = true;

var app = new Vue ({
    el: '#root',
    data: {
        scriviTxt: '',
        restaurants: [],
        categories: [],
        searchResult:[],
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
        cerca: function() {
          axios.get( `http://localhost:8000/api/search-restaurant/${this.scriviTxt}`)
          .then((response) => {
            this.searchResult = response.data.response;
          })
          },
    }
});

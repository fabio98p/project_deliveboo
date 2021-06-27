Vue.config.devtools = true;

var app = new Vue({
    el: '#root',
    data: {
        scriviTxt: '',
        restaurants: [],
        categories: [],
        searchResult: [],
        checkClick: false,
        deleteForm: false,
        // prende le categorie dalla selezione
        categoriesApi: [],

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
        checkReverse: function () {
            this.checkClick = !this.checkClick;
        },
        cerca: function () {
            axios.get(`http://localhost:8000/api/search-restaurant/${this.scriviTxt}`)
                .then((response) => {
                    this.searchResult = response.data.response;
                })
        },
        filter: function () {

        },
    }
});

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
        categorySelected: '',
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
        filterRestaurants: function (id) {
            if (this.categorySelected == id) {
                this.categorySelected = ''
                axios.get('http://localhost:8000/api/restaurants').then((response) => {
                    this.restaurants = response.data.response;
                })
            } else {
                this.categorySelected = id
                axios.get(`http://localhost:8000/api/filter-restaurants/${id}`)
                    .then((response) => {
                        this.restaurants = response.data.response;
                    })
            }
        },
    },
    computed: {
    },
})

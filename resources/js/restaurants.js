Vue.config.devtools = true;

var app = new Vue ({
    el: '#root',
    data: {
        restaurants: [],
        checkClick: false,
    },
    created() {
      axios.get('http://localhost:8000/api/restaurants').then((response) => {
            this.restaurants = response.data.response;
        })
    },
    methods: {
        checkReverse() {
            this.checkClick = !this.checkClick;
        }
    }
});

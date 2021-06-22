var app = new Vue ({
    el: '#app',
    data: {
        restaurants: [],
        dishes: [],
    },
    created() {
        axios.get('http://localhost:8000/api/restaurants').then((response) => {
            this.restaurants = response.data.data;
        })
    },
});
var app = new Vue ({
    el: '#app',
    data: {
        categories: [],
        restaurants: [],
    },
    created() {
        axios.get('http://localhost:8000/api/restaurants').then((response) => {
            this.videogames = response.data.data;
        })
    },
});
var app = new Vue ({
    el: '#root',
    data: {
        restaurants: [],
    },
    created() {
      axios.get('http://localhost:8000/api/restaurants').then((response) => {
            this.restaurants = response.data.response;
        })
    },
});

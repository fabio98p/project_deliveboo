var app = new Vue ({
    el: '#app',
    data: {
        categories: [],
        restaurants: [],
    },
    created() {
        axios.get('http://localhost:8000/api/videogames').then((response) => {
            this.videogames = response.data.data;
        })
    },
});
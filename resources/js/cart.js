Vue.config.devtools = true;

var app = new Vue({
    el: '#cart',
    data: {
        dishes: [],
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
        addDish: function (dish) {
            axios.get(`http://localhost:8000/api/dish/${dish}`)
                .then((response) => {
                    var dishesElements = localStorage
                    var dishesKey = Object.keys(dishesElements);
                    var dish = response.data.response
                    if (dishesKey.includes(response.data.response['slug'])) {
                        console.log('si');
                        localStorage.removeItem(dish['slug'])

                    } else {
                        console.log('no');
                        localStorage.setItem(dish['slug'], JSON.stringify(dish))

                    }
                    this.dishes = []
                    for (let i = 0; i < dishesElements.length; i++) {
                        dishObject = JSON.parse(dishesElements[dishesKey[i]])
                        console.log('for', dishObject);
                        this.dishes.push(dishObject)
                    }

                })
        },
        sumDish: function (dish) {
            dish = response.data.response
            localStorage.setItem(dish['slug'], JSON.stringify(dish))
        },
    },
})

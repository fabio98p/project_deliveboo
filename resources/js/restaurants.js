Vue.config.devtools = true;

var app = new Vue ({
    el: '#app',
    data: {
        categories: [],
        restaurants: [],
        checkClick: false,
    },
    created() {
        axios.get('http://localhost:8000/api/restaurants').then((response) => {
            this.restaurants = response.data.data;
        })
    },
    methods: {
        checkReverse() {
            this.checkClick = !this.checkClick;
        }
    }
});

// $('select').selectpicker();

// var expanded = false;

// function showCheckboxes() {
//   var checkboxes = document.getElementById("checkboxes");
//   if (!expanded) {
//     checkboxes.style.display = "block";
//     expanded = true;
//   } else {
//     checkboxes.style.display = "none";
//     expanded = false;
//   }
// }
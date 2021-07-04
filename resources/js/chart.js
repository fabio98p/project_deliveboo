require('./bootstrap');
import Vue from 'vue';

const stats = new Vue({
    el: '#stats',
    data: {
        year: new Date().getFullYear(),
        id: window.id,
    },
    methods: {

        filterByYear() {
            let monthsPrice = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            let yearPrice = 0;
            let orderTotalPrice = [];


            axios
                .get(`http://localhost:8000/api/ordersShow/${this.id}`)
                .then(
                    (response) => {

                        let orders = response.data.response;

                        const self = this;


                        orders.forEach(
                            (element) => {
                                let orderCreateDate = element.created_at;
                                let orderTotalPrice = element.total_price;
                                for (var i = 0; i <= 12; i++) {
                                    if (orderCreateDate.substr(5, 2) == i) {
                                        monthsPrice[i - 1] = orderTotalPrice;
                                    }
                                }


                                //Guadagno totale dell'anno
                                monthsPrice.forEach(
                                    (element) => {
                                        yearPrice += element;
                                    });
                            });




                        var ctx = document.getElementById('chart').getContext('2d');
                        var chart = new Chart(ctx, {
                            type: 'line',

                            data: {
                                labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
                                datasets: [{
                                    label: "Guadagno totale: " + 575 + "€",
                                    backgroundColor: 'rgba(255, 168, 3 , 0.4)',
                                    borderColor: 'rgb(255, 168, 3)',
                                    data: monthsPrice,
                                }]
                            },
                            options: {
                                legend: {
                                    labels: {
                                        // This more specific font property overrides the global property
                                        fontSize: 16,
                                    }
                                },
                            }

                        });

                    });
        }
    },

    mounted() {
        this.filterByYear();
    }
});

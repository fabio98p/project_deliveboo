Vue.config.devtools = true;

var app = new Vue({
    el: '#nav',
    data: {
        showNav: false,
    },
    
    methods: {
        showNavToggler: function() {
            console.log('ciao');
            this.showNav = !this.showNav;
        }
    },
})

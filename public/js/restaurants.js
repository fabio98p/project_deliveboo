/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/restaurants.js":
/*!*************************************!*\
  !*** ./resources/js/restaurants.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

Vue.config.devtools = true;
var app = new Vue({
  el: '#root',
  data: {
    scriviTxt: '',
    restaurants: [],
    categories: [],
    searchResult: [],
    filterResult: [],
    checkClick: false,
    deleteForm: false,
    categorySelected: '',
    search: false,
    page: 1,
    perPage: 9,
    pages: []
  },
  created: function created() {
    var _this = this;

    axios.get('http://localhost:8000/api/categories').then(function (response) {
      _this.categories = response.data.response;
    });
    axios.get('http://localhost:8000/api/restaurants').then(function (response) {
      _this.restaurants = response.data.response;
    });
  },
  methods: {
    checkReverse: function checkReverse() {
      this.checkClick = !this.checkClick;
    },
    cerca: function cerca() {
      var _this2 = this;

      axios.get("http://localhost:8000/api/search-restaurant/".concat(this.scriviTxt)).then(function (response) {
        _this2.searchResult = response.data.response;
      });
      this.scriviTxt = '';
      this.filterResult = [];
      this.categorySelected = '';
      this.search = true;
      this.pages = [];
      this.page = 1;
      this.setPages();
    },
    filterRestaurants: function filterRestaurants(id) {
      var _this3 = this;

      this.categorySelected = id;
      axios.get("http://localhost:8000/api/filter-restaurants/".concat(id)).then(function (response) {
        _this3.filterResult = response.data.response;
      });
      this.searchResult = [];
      this.pages = [];
      this.page = 1;
      this.setPages();
    },
    restart: function restart() {
      this.search = false;
      this.categorySelected = '';
      this.filterResult = [];
      this.searchResult = [];
      this.pages = [];
      this.page = 1;
      this.setPages();
    },
    setPages: function setPages() {
      var numberOfPages = Math.ceil(this.results.length / this.perPage);

      for (var index = 1; index <= numberOfPages; index++) {
        this.pages.push(index);
      }
    },
    paginate: function paginate(restaurants) {
      var page = this.page;
      var perPage = this.perPage;
      var from = page * perPage - perPage;
      var to = page * perPage;
      return restaurants.slice(from, to);
    }
  },
  computed: {
    results: function results() {
      if (this.categorySelected == '' && !this.search) {
        return this.restaurants;
      } else if (this.categorySelected != '') {
        return this.filterResult;
      } else {
        return this.searchResult;
      }
    },
    displayedResults: function displayedResults() {
      return this.paginate(this.results);
    }
  },
  watch: {
    restaurants: function restaurants() {
      this.setPages();
    }
  }
});

/***/ }),

/***/ 1:
/*!*******************************************!*\
  !*** multi ./resources/js/restaurants.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\User\Desktop\Boolean-careers\GitHub\Progetto finale\project_deliveboo\resources\js\restaurants.js */"./resources/js/restaurants.js");


/***/ })

/******/ });
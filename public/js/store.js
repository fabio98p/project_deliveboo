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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/store.js":
/*!*******************************!*\
  !*** ./resources/js/store.js ***!
  \*******************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var cart = window.localStorage.getItem('cart');
var cartCount = window.localStorage.getItem('cartCount');
var store = {
  state: {
    cart: cart ? JSON.parse(cart) : [],
    cartCount: cartCount ? parseInt(cartCount) : 0
  },
  mutations: {
    addToCart: function addToCart(state, item) {
      var found = state.cart.find(function (product) {
        return product.id == item.id;
      });

      if (state.cartCount > 0) {
        if (item.restaurant_id == state.cart[0].restaurant_id) {
          if (found) {
            found.quantity++;
            found.totalPrice = found.quantity * found.price;
          } else {
            state.cart.push(item);
            Vue.set(item, 'quantity', 1);
            Vue.set(item, 'totalPrice', item.price);
          }

          state.cartCount++;
        }
      } else {
        if (found) {
          found.quantity++;
          found.totalPrice = found.quantity * found.price;
        } else {
          state.cart.push(item);
          Vue.set(item, 'quantity', 1);
          Vue.set(item, 'totalPrice', item.price);
        }

        state.cartCount++;
      }

      this.commit('saveCart');
    },
    removeFromCart: function removeFromCart(state, item) {
      var index = state.cart.indexOf(item);
      var found = state.cart.find(function (product) {
        return product.id == item.id;
      });

      if (found && found.quantity > 1) {
        found.quantity--;
        found.totalPrice = found.quantity * found.price;
      } else {
        state.cart.splice(index, 1);
      }

      state.cartCount--;
      this.commit('saveCart');
    },
    emptyCart: function emptyCart(state) {
      state.cart = [];
      state.cartCount = 0;
      this.commit('saveCart');
    },
    changeQuantity: function changeQuantity(state, item) {
      var index = state.cart.indexOf(item);
      var found = state.cart.find(function (product) {
        return product.id == item.id;
      });
      found.totalPrice = found.quantity * found.price;
      found.quantity = item.quantity;
      var sum = 0;
      state.cart.forEach(function (element) {
        sum = sum + parseInt(element.quantity);
      });
      state.cartCount = sum;

      if (found.quantity == 0) {
        state.cart.splice(index, 1);
      }

      this.commit('saveCart');
    },
    removeItemFromCart: function removeItemFromCart(state, item) {
      var index = state.cart.indexOf(item);
      var found = state.cart.find(function (product) {
        return product.id == item.id;
      });
      state.cartCount = state.cartCount - found.quantity;
      state.cart.splice(index, 1);
      this.commit('saveCart');
    },
    saveCart: function saveCart(state) {
      window.localStorage.setItem('cart', JSON.stringify(state.cart));
      window.localStorage.setItem('cartCount', state.cartCount);
    }
  }
};
/* harmony default export */ __webpack_exports__["default"] = (store);

/***/ }),

/***/ 2:
/*!*************************************!*\
  !*** multi ./resources/js/store.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\.ProgettiInviatiGit\project_deliveboo\resources\js\store.js */"./resources/js/store.js");


/***/ })

/******/ });
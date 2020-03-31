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

/***/ "./resources/js/menuCarrito.js":
/*!*************************************!*\
  !*** ./resources/js/menuCarrito.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(main);

function main() {
  console.log('menuCarrito');
  $(".add").click(addProduct);
  $(".remove").click(removeProduct);
}

function addProduct(e) {
  var counter = $(e.target).siblings()[2];
  var id = $(e.target).siblings().first().val();
  var nameAndDescription = $(e.target).parent().siblings().first();
  var price = $(e.target).parent().siblings().last();

  if (counter.innerHTML == 0) {
    counter.innerHTML = parseInt(counter.innerHTML) + 1;
    $("<div class='col-10 row' id='" + id + "'></div>").appendTo('#ShoppingCart');
    nameAndDescription.clone().appendTo('#ShoppingCart > #' + id);
    price.clone().appendTo('#ShoppingCart > #' + id);
  } else {
    counter.innerHTML = parseInt(counter.innerHTML) + 1;
    var priceSum = $('#ShoppingCart > #' + id).children().last().children();
    var sum = parseFloat(priceSum.text()) + parseFloat(price.children().text());
    priceSum.text(sum.toFixed(2));
  }

  var total = $(".total");
  var priceProducts = $("#ShoppingCart > div > div > .price");
  var totalPrice = 0;
  priceProducts.each(function () {
    totalPrice = parseFloat($(this).text()) + totalPrice;
  });
  total.text(totalPrice.toFixed(2));
  $('.totalShopping').val(totalPrice.toFixed(2));
}

function removeProduct(e) {
  var id = $(e.target).siblings().first().val();
  var counter = $(e.target).siblings()[1];
  var price = $(e.target).parent().siblings().last();
  console.log($(e.target).parent().siblings().last());

  if (counter.innerHTML == 0) {} else if (counter.innerHTML == 1) {
    $('#ShoppingCart > #' + id).remove();
    counter.innerHTML = parseInt(counter.innerHTML) - 1; //borrar el div
  } else {
    counter.innerHTML = parseInt(counter.innerHTML) - 1;
    var priceSum = $('#ShoppingCart > #' + id).children().last().children();
    var sum = parseFloat(priceSum.text()) - parseFloat(price.children().text());
    priceSum.text(sum.toFixed(2));
  }

  var total = $(".total");
  var priceProducts = $("#ShoppingCart > div > div > .price");
  var totalPrice = 0;
  priceProducts.each(function () {
    totalPrice = parseFloat($(this).text()) + totalPrice;
  });
  total.text(totalPrice.toFixed(2));
  $('.totalShopping').val(totalPrice.toFixed(2));
}

/***/ }),

/***/ 2:
/*!*******************************************!*\
  !*** multi ./resources/js/menuCarrito.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp2\htdocs\modulo-order-mensakas\mensakas\mensakas-core\resources\js\menuCarrito.js */"./resources/js/menuCarrito.js");


/***/ })

/******/ });
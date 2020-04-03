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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/updateGeolocation.js":
/*!*******************************************!*\
  !*** ./resources/js/updateGeolocation.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function updateGeolocation() {
  function localizacion(posicion) {
    var latitude = posicion.coords.latitude;
    var longitude = posicion.coords.longitude;
    $('.lat').val(latitude);
    $('.lon').val(longitude);
    var myLatLng = {
      lat: latitude,
      lng: longitude
    };
    var mapOptions = {
      zoom: 17,
      center: myLatLng
    };
    var map = new google.maps.Map(document.getElementById('map'), mapOptions);
    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: 'My location'
    });
  }

  navigator.geolocation.getCurrentPosition(localizacion);
}

google.maps.event.addDomListener(window, 'load', updateGeolocation); //refresh to 10 seconds

setInterval(function () {
  updateGeolocation();
}, 10000);

function updateGeo() {
  var longitude = $('.lon').val();
  var latitude = $('.lat').val();
  var id_rider = $('.id').val();
  $.ajax({
    type: 'POST',
    url: 'api/geolocation/' + id_rider,
    beforeSend: function beforeSend(xhr) {
      var token = $('meta[name="csrf_token"]').attr('content');

      if (token) {
        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
      }
    },
    data: {
      '_method': 'PUT',
      'latitude': latitude,
      'longitude': longitude
    },
    success: function success(data) {
      console.log(data);
    }
  });
}

setInterval(function () {
  updateGeo();
}, 10000);

/***/ }),

/***/ 4:
/*!*************************************************!*\
  !*** multi ./resources/js/updateGeolocation.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\ferra\Desktop\mensakas\mensakas-core\resources\js\updateGeolocation.js */"./resources/js/updateGeolocation.js");


/***/ })

/******/ });
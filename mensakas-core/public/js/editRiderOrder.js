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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/editRiderOrder.js":
/*!****************************************!*\
  !*** ./resources/js/editRiderOrder.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

console.log('EDIT RIDER ORDER JS');
$(document).ready(main); //Add event on button #changeRiderButton --- Call function getAllDataRidersAPI();

function main() {
  $('#changeRiderButton').click(showOrHideRiders);
  getAllDataRidersAPI();
}
/**
* Function where we create the select and put all the options of the select with the json of the riders, and hide it and then use it
* @params JSON with all data of riders
*/


function createSelectForChangeRider(jsonRiders) {
  var selectWithRiders = $('<select>').attr('id', 'selectWithRiders');
  $.each(jsonRiders, function (index, value) {
    selectWithRiders.append('<option value=' + value.id + '>' + value.username + '</option>');
  });
  $('#changeRiderButton').before(selectWithRiders);
  selectWithRiders.hide();
} //Function to show and stop showing the button to show the riders,
//if text button is Select Rider then call a function updateOrCreateRiderOrder(rider_id,order_id); with new data


function showOrHideRiders() {
  if ($('#changeRiderButton').text() == 'Select new rider') {
    $('#selectWithRiders').toggle();
    $('#changeRiderButton').text('Confirm rider');
  } else if ($('#changeRiderButton').text() == 'Confirm rider') {
    $('#selectWithRiders').toggle();
    $('#changeRiderButton').text('Select new rider');
    var rider_id = $("#selectWithRiders option:selected").val();
    var order_id = $("#orderID").val();
    updateOrCreateRiderOrder(rider_id, order_id);
  }
} //Call API and get all data then call function createSelectForChangeRider(data['data']); for create new select


function getAllDataRidersAPI() {
  $.ajax({
    type: 'GET',
    url: ' http://localhost:8000/api/rider',
    dataType: 'json',
    success: function success(data) {
      createSelectForChangeRider(data['data']);
    }
  });
} //Function that is activated by clicking the button(Select Rider) where we make the API calls to do the update or the store


function updateOrCreateRiderOrder(rider_id, order_id) {
  $('#rider').text($("#selectWithRiders option:selected").text());
  var deliveryID = $('#deliveryID').val(); //If exist data in table delivery, update delivery

  if (deliveryID > 0) {
    $.ajax({
      type: 'POST',
      url: '/api/delivery/' + deliveryID,
      beforeSend: function beforeSend(xhr) {
        var token = $('meta[name="csrf_token"]').attr('content');

        if (token) {
          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        }
      },
      data: {
        '_method': 'PUT',
        'riders_id': rider_id,
        'order_id': order_id
      },
      success: function success(data) {
        alert(data);
      }
    }); //If dont exist data in table delivery, store delivery
  } else {
    $.ajax({
      type: 'POST',
      url: '/api/delivery/',
      beforeSend: function beforeSend(xhr) {
        var token = $('meta[name="csrf_token"]').attr('content');

        if (token) {
          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        }
      },
      data: {
        'riders_id': rider_id,
        'order_id': order_id
      },
      success: function success(data) {
        alert(data);
      }
    });
  }
}

/***/ }),

/***/ 3:
/*!**********************************************!*\
  !*** multi ./resources/js/editRiderOrder.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/rafa/laravelDev/mensakas/mensakas-core/resources/js/editRiderOrder.js */"./resources/js/editRiderOrder.js");


/***/ })

/******/ });
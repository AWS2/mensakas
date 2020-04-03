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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/editMessageOrder.js":
/*!******************************************!*\
  !*** ./resources/js/editMessageOrder.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

console.log("MESSAGE JS");
$(document).ready(main);
/**
* Function where we add new event on button id=#addNewMessage
*/

function main() {
  $('#inputMessage').toggle();
  $('#newMessage').toggle();
  $('#addNewMessage').click(showOrHideInput);
  $('#deleteMessages').click(deleteMessage);
}

function deleteMessage() {
  if (confirm('Are you sure?')) {
    var intOrderId = $("#orderID").val();
    $.ajax({
      type: 'POST',
      url: '/api/order/' + intOrderId + '/deletemessage',
      beforeSend: function beforeSend(xhr) {
        var token = $('meta[name="csrf_token"]').attr('content');

        if (token) {
          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        }
      },
      data: {
        '_method': 'PUT',
        'order_id': intOrderId
      },
      success: function success(data) {
        alert(data[0]);

        if (data[0].includes("deleted")) {
          $('#message').text(data[1]);
        }
      }
    });
  }
}
/**
* Function where we call function addMessage(textMessage); if the button text is "Confirm message"
*/


function showOrHideInput() {
  var strInputMessage = $('#inputMessage');
  var buttonNewMessage = $('#addNewMessage');

  if (buttonNewMessage.text() == "New message") {
    strInputMessage.val("").toggle();
    $('#newMessage').toggle();
    buttonNewMessage.text("Confirm").css('color', 'white').attr('class', 'btn btn-success');
  } else if (buttonNewMessage.text() == "Confirm") {
    addMessage(strInputMessage.val());
    strInputMessage.toggle();
    $('#newMessage').toggle();
    buttonNewMessage.attr('class', 'btn btn-warning').css('color', 'black').text("New message");
  }
}
/**
* Function where we add new message (API)
* @params New message text
*/


function addMessage(textMessage) {
  var strMessage = textMessage;
  var intOrderId = $("#orderID").val();
  $.ajax({
    type: 'POST',
    url: '/api/order/' + intOrderId + '/message',
    beforeSend: function beforeSend(xhr) {
      var token = $('meta[name="csrf_token"]').attr('content');

      if (token) {
        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
      }
    },
    data: {
      '_method': 'PUT',
      'message': strMessage,
      'order_id': intOrderId
    },
    success: function success(data) {
      alert(data);

      if (data.includes("Added")) {
        $('#message').text(strMessage);
      } else if (data.includes("Updated")) {
        $('#message').text($('#message').text() + " / " + strMessage);
      }
    }
  });
}

/***/ }),

/***/ 5:
/*!************************************************!*\
  !*** multi ./resources/js/editMessageOrder.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\ferra\Desktop\mensakas\mensakas-core\resources\js\editMessageOrder.js */"./resources/js/editMessageOrder.js");


/***/ })

/******/ });
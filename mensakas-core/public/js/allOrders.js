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
/******/ 	return __webpack_require__(__webpack_require__.s = 7);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/allOrders.js":
/*!***********************************!*\
  !*** ./resources/js/allOrders.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

//call to OrderAPI with AJAX and render of the table
$(document).ready(main);

function main() {
  createOrdersTable();
}

function createOrdersTable() {
  $.ajax({
    type: 'GET',
    url: 'api/orders',
    dataType: 'json',
    success: function success(data) {
      //RENDER OF THE TABLE
      var arrayDataComanda = data['data'];
      var arrayComanda; //this bucle gets the length of the comanda array to fill the table

      for (var i = 0; i < arrayDataComanda.length; i++) {
        arrayComanda = arrayDataComanda[i];
        arrayDataComandaId = arrayComanda['id'];
        $("#header").after("<tr id='tableContent" + i + "'>");
        getAllDataComanda(data, arrayDataComandaId, i);
        showEditButton(data, arrayDataComandaId, i);
        getAllDataCustomer(arrayDataComandaId, i);
        getAllDataStatus(arrayDataComandaId, i);
        getAllDataRiders(arrayDataComandaId, i);
        getAllDataAmount(arrayDataComandaId, i);
        getAllDataStatusMessage(arrayDataComandaId, i);
        $("</tr>").appendTo("#tableContent" + i);
      }
    }
  });
}

function getAllDataComanda(data, id, i) {
  showComandaButton(data['data'][i], id, i);
}

function showComandaButton(dataComanda, id, i) {
  var arrayDataComandaId;
  arrayDataComandaId = dataComanda['id'];
  $("<td id=tdShow>").appendTo("#tableContent" + i); //link to comandas.show

  $("<a id='showLink' href='comandas/" + arrayDataComandaId + "'>").appendTo("#tdShow");
  $("<button type='submit' class='btn btn-success fa fa-search'></button>").appendTo('#showLink');
  $("</a>").appendTo("#td" + i + "");
  $("</td>").appendTo("#tableContent" + i);
}

function showEditButton(dataComanda, id, i) {
  var arrayDataComandaId;
  arrayDataComandaId = dataComanda['data'][i]; //link to comandas.edit

  $("<td id=tdEdit>").appendTo("#tableContent" + i);
  $("<a id='editLink' href='comandas/" + arrayDataComandaId['id'] + "/edit'>").appendTo("#tdEdit");
  $("<button type='submit' value='Edit' class='btn btn-warning'><i class='fa fa-pencil'></i> Edit</button>").appendTo('#editLink');
  $("</a>").appendTo("#tdtdEdit");
  $("</td>").appendTo("#tableContent" + i);
}

function getAllDataCustomer(id, i) {
  $.ajax({
    type: 'GET',
    url: 'api/order/customer/' + id,
    dataType: 'json',
    async: false,
    success: function success(data) {
      showCustomerEmail(data['data'], id, i);
    }
  });
}

function showCustomerEmail(data, id, i) {
  var customerId = data['id'];
  var customerEmail = data['email'];
  $("<td>" + customerEmail + "</td>").appendTo("#tableContent" + i);
}

function getAllDataStatus(id, i) {
  $.ajax({
    type: 'GET',
    url: 'api/order/status/' + id,
    dataType: 'json',
    success: function success(data) {
      dataLength = data['data'].length;
      showStatus(data['data'], i);
    }
  });
}

function showStatus(data, i) {
  $("<td>" + data['status'] + "</td>").appendTo("#tableContent" + i);
}

function getAllDataRiders(id, i) {
  $.ajax({
    type: 'GET',
    url: 'api/order/rider/' + id,
    dataType: 'json',
    success: function success(data) {
      showRiderUsername(data['data'], id, i);
    }
  });
}

function showRiderUsername(data, id, i) {
  var riderUsername;

  if (data.length == 1) {
    riderUsername = data[0]['username'];
    $("<td>" + riderUsername + "</td>").appendTo("#tableContent" + i);
  } else {
    $("<td> -- </td>").appendTo("#tableContent" + i);
  }
}

function getAllDataAmount(id, i) {
  $.ajax({
    type: 'GET',
    url: 'api/order/amount/' + id,
    dataType: 'json',
    success: function success(data) {
      showAmount(data['data'], id, i);
    }
  });
}

function showAmount(data, id, i) {
  var orderAmount;

  if (data.length == 1) {
    orderAmount = data[0]['amount'];
    $("<td>" + orderAmount + "€ </td>").appendTo("#tableContent" + i);
  } else {
    $("<td> -- </td>").appendTo("#tableContent" + i);
  }
}

function getAllDataStatusMessage(id, i) {
  $.ajax({
    type: 'GET',
    url: 'api/order/message/' + id,
    dataType: 'json',
    success: function success(data) {
      showStatusMessage(data['data'], id, i);
    }
  });
}

function showStatusMessage(data, id, i) {
  var StatusMessage;

  if (data['message'] == null) {
    $("<td> -- </td>").appendTo("#tableContent" + i);
  } else {
    StatusMessage = data['message'];
    $("<td>" + StatusMessage + "</td>").appendTo("#tableContent" + i);
  }
}

/***/ }),

/***/ 7:
/*!*****************************************!*\
  !*** multi ./resources/js/allOrders.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\ferra\Desktop\mensakas\mensakas-core\resources\js\allOrders.js */"./resources/js/allOrders.js");


/***/ })

/******/ });
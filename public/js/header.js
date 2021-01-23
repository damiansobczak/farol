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

/***/ "./resources/js/header.js":
/*!********************************!*\
  !*** ./resources/js/header.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./menu */ "./resources/js/menu.js");

__webpack_require__(/*! ./popover */ "./resources/js/popover.js");

/***/ }),

/***/ "./resources/js/menu.js":
/*!******************************!*\
  !*** ./resources/js/menu.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

var menu = document.querySelector("#menu");
var menuTrigger = document.querySelector("#menu-trigger");
var open = false;
menuTrigger.addEventListener("click", function (e) {
  e.preventDefault();
  e.stopPropagation();

  if (open) {
    menu.classList.add("hidden");
    open = false;
    return;
  } else {
    menu.classList.remove("hidden");
    open = true;
  }
});

/***/ }),

/***/ "./resources/js/popover.js":
/*!*********************************!*\
  !*** ./resources/js/popover.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var trigger = document.querySelector("#menu-popover-trigger");
var popover = document.querySelector("#menu-popover");
var animating = false;

var popIn = function popIn() {
  animating = true;
  popover.classList.remove("hidden", "opacity-0");

  popover.animate([{
    opacity: "0",
    transform: "translateY(-10px)"
  }, {
    opacity: "1",
    transform: "translateY(0)"
  }], {
    duration: 100,
    fill: "both",
    easing: "cubic-bezier(0.42, 0, 0.58, 1)"
  }).onfinish = function () {
    trigger.setAttribute("aria-expanded", "true");
    animating = false;
  };
};

var popOut = function popOut() {
  animating = true;

  popover.animate([{
    opacity: "1",
    transform: "translateY(0)"
  }, {
    opacity: "0",
    transform: "translateY(-10px)"
  }], {
    duration: 100,
    fill: "both",
    easing: "cubic-bezier(0.42, 0, 0.58, 1)"
  }).onfinish = function () {
    trigger.setAttribute("aria-expanded", "false");
    popover.classList.add("hidden", "opacity-0");
    animating = false;
  };
};

trigger.addEventListener("click", function (e) {
  e.preventDefault();
  e.stopPropagation();

  if (trigger.getAttribute("aria-expanded") === "false" && !animating) {
    popIn();
  }

  if (trigger.getAttribute("aria-expanded") === "true" && !animating) {
    popOut();
  }
});

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/header.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/damiansobczak/sites/farol/resources/js/header.js */"./resources/js/header.js");


/***/ })

/******/ });
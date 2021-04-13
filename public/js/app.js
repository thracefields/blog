(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/app"],{

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _vizuaalog_bulmajs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @vizuaalog/bulmajs */ "./node_modules/@vizuaalog/bulmajs/src/bulma.js");
/* harmony import */ var buefy__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! buefy */ "./node_modules/buefy/dist/esm/index.js");
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
__webpack_require__(/*! ./bootstrap */ "./resources/js/bootstrap.js");

window.Vue = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");


Vue.use(buefy__WEBPACK_IMPORTED_MODULE_1__["default"]);
$(function () {
  $('form').attr('autocomplete', 'off'); // $('.navbar-burger').on('click', function () {
  //     $('.navbar-burger').toggleClass('is-active');
  //     $('.navbar-menu').toggleClass('is-active');
  // });

  $('form').on('submit', function () {
    $(this).find('button').toggleClass('is-loading');
  }); // $('.dropdown').on('click', function () {
  //     $(this).toggleClass('is-active');
  // });

  $('.file-input').on('change', function () {
    if (this.files.length > 0) {
      $('.file-name').html(this.files[0].name);
    }
  }); // $('.js-search-trigger').click(function () {
  //     $('modal').toggleClass('is-active');
  // });
});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their 'basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
// Vue.component('search-modal', require('./components/SearchModal.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// let app = new Vue({
//     el: '#app'
// });

/***/ }),

/***/ "./resources/js/bootstrap.js":
/*!***********************************!*\
  !*** ./resources/js/bootstrap.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

window._ = __webpack_require__(/*! lodash */ "./node_modules/lodash/lodash.js");
/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
  window.$ = window.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

  __webpack_require__(/*! @fortawesome/fontawesome-free */ "./node_modules/@fortawesome/fontawesome-free/js/fontawesome.js");

  window.InscrybMDE = __webpack_require__(/*! inscrybmde */ "./node_modules/inscrybmde/src/js/inscrybmde.js");
} catch (e) {}
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */


window.axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

var token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
// import Echo from 'laravel-echo'
// window.Pusher = require('pusher-js');
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

/***/ }),

/***/ 0:
/*!***********************************!*\
  !*** multi ./resources/js/app.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/thracefields/Documents/Workspace/blog/resources/js/app.js */"./resources/js/app.js");


/***/ }),

/***/ 1:
/*!********************!*\
  !*** fs (ignored) ***!
  \********************/
/*! no static exports found */
/***/ (function(module, exports) {

/* (ignored) */

/***/ })

},[[0,"/js/manifest","/js/vendor"]]]);
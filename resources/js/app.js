/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Bulma from '@vizuaalog/bulmajs';
import Buefy from 'buefy';


Vue.use(Buefy);

$(function () {
    $('form').attr('autocomplete', 'off');
    // $('.navbar-burger').on('click', function () {
    //     $('.navbar-burger').toggleClass('is-active');
    //     $('.navbar-menu').toggleClass('is-active');
    // });
    $('form').on('submit', function () {
        $(this).find('button').toggleClass('is-loading');
    });

    // $('.dropdown').on('click', function () {
    //     $(this).toggleClass('is-active');
    // });

    $('.file-input').on('change', function () {
        if (this.files.length > 0) {
            $('.file-name').html(this.files[0].name);
        }
    });

    // $('.js-search-trigger').click(function () {
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

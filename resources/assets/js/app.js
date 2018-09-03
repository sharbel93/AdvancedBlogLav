
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// window.Buefy = require('buefy');
import Buefy from 'buefy';


// Global variable
// Vue.use(Buefy.default)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

var app = new Vue({
    el: '#app',
    data: {}
});

$(document).ready(function(e) {
    $('button.dropdown').hover(function(e) {
        $(this).toggleClass('is-open');
    });
});

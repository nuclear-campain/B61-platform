
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

/**
 * Implementation of summernote WYSIWYG
 */
require('../../node_modules/summernote/dist/summernote-bs4');

$(document).ready(function() {
    $('#contentArea').summernote({
        placeholder: 'Meh',
        shortcuts: false,
        disableResizeEditor: true,
        height: 250,             
        minHeight: null,            
        maxHeight: null,             
        focus: false,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
          ]
    });
});

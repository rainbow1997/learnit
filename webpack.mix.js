const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


mix.js('resources/js/app.js', '/public_html/js')
.js('resources/js/persianDatepicker.min.js','/public_html/js/persianDatepicker.min.js')
.styles(['resources/plainCSS/persianDatepicker-default.css','resources/plainCSS/rtl-template.css'],'/public_html/css/rtl.css')
.sass('resources/sass/app.scss', '/public_html/css');

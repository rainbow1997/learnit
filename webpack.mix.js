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

mix.js('resources/js/app.js', 'public/js')
.js('resources/js/persianDatepicker.min.js','public/js/persianDatepicker.min.js')
.styles(['resources/plainCSS/persianDatepicker-default.css','resources/plainCSS/rtl-template.css'],'public/css/rtl.css')
.sass('resources/sass/app.scss', 'public/css');

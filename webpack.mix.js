const {mix} = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .scripts([
        'node_modules/numeral/numeral.js',
        'node_modules/taggle/src/taggle.js',
        'node_modules/chart.js/dist/Chart.js',
        'node_modules/rateyo/min/jquery.rateyo.min.js',
    ], 'public/js/lib.js')
    .copy('resources/assets/js/ckeditor', 'public/js/ckeditor', false)
    .copy('resources/assets/select2', 'public/select2', false)
    .copy('resources/assets/css/materialize.css','public/css')
    .copy('resources/assets/js/jquery-2.1.1.min.js','public/js')
    .copy('resources/assets/js/materialize.js','public/js')
    .copy('node_modules/rateyo/min/jquery.rateyo.min.css', 'public/css')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/mobile.scss', 'public/css')

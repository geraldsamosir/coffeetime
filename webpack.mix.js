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
        'node_modules/taggle/src/taggle.js'
    ], 'public/js/lib.js')
    .copy('resources/assets/css/materialize.css','public/css')
    .copy('resources/assets/css/jquery-2.1.1.min.js','public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/mobile.scss', 'public/css')

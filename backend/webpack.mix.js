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

// webpack.mix.js (新しく作った jQuery, vanilla のソースコードのパスを追加)
mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/assets/test_jquery.js', 'public/js') 
    .scripts('resources/js/assets/test_vanilla.js', 'public/js/test_vanilla.js')
    .sass('resources/sass/app.scss', 'public/css');
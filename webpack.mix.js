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

mix.scripts([
    'resources/assets/libs/jquery/jquery.min.js',
    'resources/assets/libs/bootstrap/js/bootstrap.js',
    'resources/assets/js/project.js',
    'resources/assets/js/register.js',
    'resources/assets/js/game.js',
], 'public/js/app.js')
    .styles([
        'resources/assets/libs/bootstrap/css/bootstrap.css',
    ], 'public/css/app.css');

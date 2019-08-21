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
    'public/js/libs/jquery/jquery.min.js',
    'public/js/libs/bootstrap/bootstrap.min.js',
    'resources/assets/js/project.js',
    'resources/assets/js/register.js',
    'resources/assets/js/game.js',
], 'public/js/app.js')
    .styles([
        'public/js/libs/bootstrap/bootstrap.css',
    ], 'public/css/app.css');

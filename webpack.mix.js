let mix = require('laravel-mix');
const THEME_PATH = 'resources/assets/';
const FRONTEND_PATH = 'public/';

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

mix.js([ 
 	'resources/assets/js/app.js',
 	'resources/assets/js/bootstrap.js',
 	], FRONTEND_PATH + 'js' )
 	.copyDirectory(THEME_PATH + 'js' , FRONTEND_PATH + 'js')
 	.copyDirectory(THEME_PATH + 'ckeditor', FRONTEND_PATH + 'ckeditor')
 	.copyDirectory(THEME_PATH + 'css', FRONTEND_PATH + 'css')
 	.copyDirectory(THEME_PATH + 'hinhanh', FRONTEND_PATH + 'hinhanh')
 	.version();


let mix = require('laravel-mix');

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

mix.sass('resources/assets/sass/app.scss', 'public/css')
   .styles([
         'public/css/app.css',
         'node_modules/admin-lte/dist/css/AdminLTE.css',
          'node_modules/select2/dist/css/select2.css',
         'node_modules/admin-lte/dist/css/skins/skin-blue.css'
       ], 'public/css/all.css');

 mix.js([
         'resources/assets/js/app.js',
         'resources/assets/js/app.module.js',
      ], 'public/js/all.js');

 // mix.js([
 //    'resources/assets/js/components/businessAdd/businessAdd.repository.js',
 //    'resources/assets/js/components/businessAdd/businessAdd.bo.js',
 //    'resources/assets/js/components/businessAdd/businessAdd.controller.js'
 // ], 'public/js/components/businessAdd.js');



mix.copyDirectory('resources/assets/js/components', 'public/js/components');

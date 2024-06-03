const mix = require('laravel-mix');

mix.js('resources/assets/js/', 'public/assets/js')
   .css('resources/assets/css/', 'public/assets/css');

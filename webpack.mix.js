const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'js')
   .sass('resources/sass/app.scss', 'css')
   .browserSync({
       proxy: 'https://packword.app',
       files: [
              'css/**/*',
              'js/**/*'
       ],
   });
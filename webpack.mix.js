const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'js')
   .sass('resources/sass/app.scss', 'css')
   .browserSync({
       proxy: 'https://wordpack.app',
       files: [
              'css/**/*',
              'js/**/*'
       ],
   });
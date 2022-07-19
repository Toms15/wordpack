const mix = require('laravel-mix');
const path = require('path');
require('laravel-mix-purgecss');
require('laravel-mix-webp');

mix
  .ImageWebp({
    from: 'resources/images',
    to: 'images',
  })

mix.js('resources/js/app.js', 'js')
   .sass('resources/sass/app.scss', 'css')
   .browserSync({
       proxy: 'https://packword.test',
       files: [
              'css/**/*',
              'js/**/*'
       ],
   })
   .purgeCss({
       extend: {
         content: [
            path.join(__dirname, '**/*.php')
         ],
         safelist: { deep: [/hljs/] },
       },
   });
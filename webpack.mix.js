const mix = require('laravel-mix');

mix.sass('resources/sass/welcome.scss', 'public/css')
   .options({
      processCssUrls: false,
      autoprefixer: {
         options: {
            browsers: ['last 2 versions'],
            cascade: false
         }
      }
   })
   .version();
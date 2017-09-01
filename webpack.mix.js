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

mix.copy('resources/assets/fonts/*', 'public/fonts')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/admin.scss', 'public/css')
   .js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/admin.js', 'public/js')
   .webpackConfig({
       module: {
         rules: [
           {
             test: /\.font\.js$/,
             use: [
               {
                 loader: 'css-loader',
                 options: {
                   url: false
                 }
               },
               { loader: 'sass-loader' },
               { loader: 'webfonts-loader' }
             ],
           }
         ]
       }
     });

let mix = require('laravel-mix');

mix.copy('resources/assets/fonts/*', 'public/fonts')
  .sass('resources/assets/sass/app.scss', 'public/css')
  .sass('resources/assets/sass/admin.scss', 'public/css')
  .js('resources/assets/js/app.js', 'public/js')
  .js('resources/assets/js/admin.js', 'public/js')
  .webpackConfig({
    module: {
      rules: [{
          test: /\.font\.js$/,
          use: [{
              loader: 'css-loader',
              options: {
                url: false
              }
            },
            {
              loader: 'sass-loader'
            },
            {
              loader: 'webfonts-loader'
            }
          ],
        }
      ]
    }
  })
  .extract(['vue'])
  .sourceMaps()
  .version();

module.exports = {
  'files': [
    '../icons/*.svg'
  ],
  'dest': './../resources/assets/fonts',
  'css': true,
  'cssDest': './resources/assets/sass/_icons.scss',
  'cssFontsUrl': '/fonts',
  'cssTemplate': 'scss.hbs',
  'templateOptions': {
    'classPrefix': 'icon-',
    'baseSelector': '.icon',
  },
  'fontName': 'icons',
  'types': ['eot', 'woff', 'woff2', 'ttf', 'svg'],
  'fileName': '[fontname].[ext]',
  'fixedWidth': true,
  'writeFiles': true
};

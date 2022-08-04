let mix = require('laravel-mix');

mix.setPublicPath('assets');
// mix.setResourceRoot('../');

mix.js('src/js/main.js', 'assets/js').vue();
mix.sass('src/scss/app.scss', 'assets/css/app.css');

// mix.js('src/js/main.js', 'assets/js/main.js').sourceMaps(false).extract(['vue']);
// mix.sass('src/scss/app.scss', 'assets/css/app.css');

mix.browserSync({
  proxy: 'http://localhost:10003',
  // files: ['*.php', './**/*.php', './includes/*.php', './includes/**/*.php', './assets/**/*.*'],
  files: [
    './src/js/*.vue',
  ],
});
    

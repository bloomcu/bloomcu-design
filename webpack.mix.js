let mix = require('laravel-mix');
const pluginPath = 'wp-content/plugins/bloomcu-design';

mix.setPublicPath('assets');
// mix.setResourceRoot('../');

mix.js('src/js/main.js', 'assets/js/main.js')
   .sass('src/scss/app.scss', 'assets/css/app.css');

mix.browserSync({
  proxy: 'http://localhost:10003',
  // files: ['*.php', './**/*.php', './includes/*.php', './includes/**/*.php', './assets/**/*.*'],
  files: [
    './src/js/*.vue',
  ],
});
    

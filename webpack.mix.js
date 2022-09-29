const path = require('path');
let mix = require('laravel-mix');

mix.alias({
    '@': path.join(__dirname, 'src')
});

mix.setPublicPath('dist');

mix.js('src/main.js', 'dist').vue();
mix.sass('src/scss/app.scss', 'dist');

mix.browserSync({
  proxy: 'http://localhost:10003',
  files: ['*.php', './**/*.php', './includes/*.php', './includes/**/*.php', './assets/**/*.*'],
  files: [
    'src/*.vue',
  ],
  notify: false
});
    

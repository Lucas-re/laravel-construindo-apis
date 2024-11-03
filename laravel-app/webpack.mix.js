// webpack.mix.js

const mix = require('laravel-mix');

// mix.js('src/app.js', 'dist').setPublicPath('dist');

mix.sass('resources/css/app.scss', 'public/css').js('resources/js/app.js', 'public/js');
    
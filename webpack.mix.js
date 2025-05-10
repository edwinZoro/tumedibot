const mix = require('laravel-mix');

mix.setPublicPath('public_html');

mix.js('resources/js/app.js', 'public_html/js')
    .vue()
    .sass('resources/sass/app.scss', 'public_html/css')
    .version();

const mix = require('laravel-mix');

mix.js(
    [
        'resources/js/app.js',
        'resources/js/router.js',
        'resources/assets/js/main.js',
        'resources/js/stores/store.js'
    ], 'public/assets/js/app.js')
    .vue()
    .styles([
            'resources/assets/css/main.css',
            'resources/assets/css/mps-page.css',
            'resources/assets/css/posts-page.css',
            'resources/assets/css/our-kids.css'
        ],
        'public/assets/css/app.css')
    .sass('resources/sass/app.scss', 'public/assets/css/bootstrap.css')
    .copyDirectory('resources/assets/img', 'public/assets/img')
    .copyDirectory('resources/assets/fonts', 'public/assets/fonts')
    .options({
        processCssUrls: false
    });

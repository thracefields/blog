const mix = require('laravel-mix');

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

mix.disableNotifications();
mix.options({ processCssUrls: false });

// mix.browserSync('localhost:8000');

mix.js('resources/js/app.js', 'public/js')
    .extract();

// mix.sass('resources/sass/app.scss', 'public/css');

mix.options({
    watchOptions: {
        ignored: /node_modules/
    }
});

// mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');


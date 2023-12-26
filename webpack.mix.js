const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

mix.js('resources/js/profile.js', 'public/js');

mix.js('resources/js/dashboard.js', 'public/js')
    .postCss('resources/css/dashboard.css', 'public/css', [
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

mix.postCss('resources/css/post.css', 'public/css', [
    require('tailwindcss'),
    require('autoprefixer'),
]);

mix.js('resources/js/follow.js', 'public/js')
    .postCss('resources/css/follow.css', 'public/css', [
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

mix.postCss('resources/css/index.css', 'public/css', [
    require('tailwindcss'),
    require('autoprefixer'),
]);

mix.js('resources/js/main.js', 'public/js')
    .postCss('resources/css/main.css', 'public/css', [
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

mix.postCss('resources/css/create_post.css', 'public/css', [
    require('tailwindcss'),
    require('autoprefixer'),
]);

mix.js('resources/js/detail.js', 'public/js')
    .postCss('resources/css/detail.css', 'public/css', [
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

mix.js('resources/js/modalReport.js', 'public/js')
    .postCss('resources/css/modal.css', 'public/css', [
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

mix.js('resources/js/info.js', 'public/js')
    .postCss('resources/css/info.css', 'public/css', [
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

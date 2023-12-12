const mix = require('laravel-mix');
let path = require('path');

let directory_asset = 'public/vendor/asset/login';
mix.setPublicPath(path.normalize(directory_asset));


let build_scss = [
    {
        from: 'Modules/Login/Resources/assets/sass/pages/login.scss',
        to: 'css/login.css',
    },
    {
        from: 'Modules/Login/Resources/assets/sass/pages/register.scss',
        to: 'css/register.css',
    },
];

let build_js = [
    {
        from: 'Modules/Login/Resources/assets/js/pages/login.js',
        to: 'css/login.js',
    },
    {
        from: 'Modules/Login/Resources/assets/js/pages/register.js',
        to: 'css/register.js',
    },
];


build_js.map((file) => {
    mix.js(file.from, file.to)
});

build_scss.map((file) => {
    mix.sass(file.from, file.to).minify(directory_asset + '/' + file.to);
});

mix.options({
    processCssUrls: false
})
    .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery'],
    });

if (mix.inProduction()) {
    mix.version();
}
mix.webpackConfig({
    resolve: {
        alias: {
            '~core_resource': path.resolve(__dirname + '/Assets'),
        }
    }
});

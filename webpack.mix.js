let mix = require('laravel-mix');

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

mix
    .scripts([
        'resources/assets/js/bootstrapadmin.js',
    ], 'public/js/bootstrapadmin.js')
    .js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/custom.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .copy('node_modules/icon-kit/dist/fonts/iconkit.woff', 'public/fonts/')
    .copy('resources/assets/images/login-background.jpg', 'public/images/')
    .copy('resources/assets/images/logo-white.png', 'public/images/')
    .copy('resources/assets/images/down-arrow.svg', 'public/img/')
    .copy('resources/assets/images/favicon.ico', 'public/images/')
    .copy('resources/assets/images/logo-sidebar.png', 'public/images/')
    .copy('resources/assets/images/login-bg.jpg', 'public/images/')
    .copy('resources/assets/css/bootstrapadmin.theme.css.map', 'public/css/')
    .copy('resources/assets/css/odometer-theme-default.css', 'public/css/')
    .copy('resources/assets/js/odometer.min.js', 'public/js/')
    .styles([
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
        'node_modules/fontawesome-free/css/all.min.css',
        'node_modules/icon-kit/dist/css/iconkit.min.css',
        'node_modules/ionicons/dist/css/ionicons.min.css',
        'node_modules/perfect-scrollbar/css/perfect-scrollbar.css',
        'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
        'node_modules/jvectormap/jquery-jvectormap.css',
        'node_modules/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css',
        'node_modules/weather-icons/css/weather-icons.min.css',
        'node_modules/c3/c3.min.css',
        'node_modules/owl.carousel/dist/assets/owl.carousel.min.css',
        'node_modules/owl.carousel/dist/assets/owl.theme.default.min.css',
        'resources/assets/css/bootstrapadmin.theme.css',
        'resources/assets/css/daterangepicker.css',
    ], 'public/css/bootstrap-admin.css')
    .sass('resources/assets/sass/_custom.scss', 'public/css')
    .version();

var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix
    .sass([
        'app.scss'
    ], './public/css/app.css')
    .styles([
        './public/css/app.css',
		'../vendor/Swiper/dist/css/swiper.min.css',
		'../vendor/lightbox2/dist/css/lightbox.min.css',
        'custom.css',
    ], 'public/css/app.css')
    .browserify('app.js')
    .scripts([
      '../vendor/jquery/dist/jquery.js',
      '../vendor/bootstrap-sass/assets/javascripts/bootstrap.js',
      '../vendor/Swiper/dist/js/swiper.jquery.min.js',
      '../vendor/lightbox2/dist/js/lightbox.min.js',
      './public/js/app.js'
    ], 'public/js/app.js')
    .version([
      'css/app.css',
      'js/app.js'
    ])
    .copy("resources/assets/img/", "public/build/img/")
    .copy("resources/assets/vendor/font-awesome/fonts", "public/build/fonts");
});

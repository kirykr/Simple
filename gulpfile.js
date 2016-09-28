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
    mix.sass('app.scss')

    .styles([
    	'libs/bootstrap.css',
    	'libs/jquery-ui.min.css',
    	'libs/metisMenu.css',
    	'libs/sb-admin-2.css',
        'libs/font-awesome.min.css',
        'libs/font-awesome-ie7.min.css',
        'libs/sweetalert.css',
    	'libs/style.css'


    ], './public/css/libs.css')

    .scripts([
    ], './public/js/libs.js')

});

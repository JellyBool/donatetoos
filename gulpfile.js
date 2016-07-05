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
    mix.styles([
        'material.min.css','android.css','devicons.min.css',
        // 'share.min.css',
        'sweetalert2.min.css','style.css'
    ]);
    mix.scripts([
        'material.min.js','vue.min.js','vue-resource.min.js',
        // 'social-share.min.js',
        'sweetalert2.min.js','echarts.min.js'
    ]);

    mix.styles(['font-awesome.css','profile.css'],'public/css/profile.css');
    mix.styles(['devicons.min.css','card.css'],'public/css/card.css');
    mix.version(["js/all.js","css/all.css"]);
});

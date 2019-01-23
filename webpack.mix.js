const mix = require("laravel-mix");

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

mix.js("resources/js/dashboard-init.js", "public/js");
mix.js("resources/js/app.js", "public/js");
mix.sass("resources/sass/app.scss", "public/css");

// mix.copy(
//     "node_modules/tail.select/css/tail.select-default.css",
//     "public/backend/css/"
// );
// mix.copy("node_modules/tail.select/js/tail.select.min.js", "public/backend/js");

// mix.copy("node_modules/quill/dist/quill.snow.css", "public/backend/css/");
// mix.copy("node_modules/quill/dist/quill.min.js", "public/backend/js");

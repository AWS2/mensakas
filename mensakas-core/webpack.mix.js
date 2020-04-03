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

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/productsCreate.js', 'public/js')
   .js('resources/js/menuCarrito.js', 'public/js')

   .js('resources/js/business/CreateBusiness.js', 'public/js/business/CreateBusiness.js')
   .js('resources/js/business/DeleteBusiness.js', 'public/js/business/DeleteBusiness.js')
   .js('resources/js/business/update.js', 'public/js/business')
   .js('resources/js/business/accept.js', 'public/js/business')


   .js('resources/js/products/CreateProduct.js', 'public/js/product/CreateProduct.js')
   .js('resources/js/products/DeleteProduct.js', 'public/js/product/DeleteProduct.js')


   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/orderStatus.scss', 'public/css')
   .sass('resources/sass/filterTable.scss', 'public/css');

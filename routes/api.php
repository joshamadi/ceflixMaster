<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get('/testing123', function (Request $request) {
//    return "I got here and it is a test tht will be deleted in future";
//})->middleware('auth');



Route::get('/search', 'SearchController@search')->name('search');

Route::post('/user', 'UserController@reg_user')->name('register');
Route::post('/user/login', 'UserController@check_login')->name('login');
Route::get('/user', 'UserController@all_users')->name('all_users');


Route::get('/profile', 'UserController@profile')->name('profile');
Route::patch('/profile', 'UserController@updateProfile')->name('updateProfile');


Route::get('/categories', 'CategoryController@index')->name('index_category');
Route::post('/category', 'CategoryController@store')->name('store_category');
Route::get('/category/{category}', 'CategoryController@show_category')->name('show_category');
Route::patch('/category/{category}', 'CategoryController@update')->name('update_category');
Route::delete('/category/{category}', 'CategoryController@delete')->name('delete_category');


Route::get('/products', 'ProductController@index')->name('index_product');
Route::post('/product/store', 'ProductController@store_product')->name('store_product');
Route::get('/product/{product}', 'ProductController@show_product')->name('show_product');
Route::patch('/product/{product}', 'ProductController@update')->name('update_product');
Route::delete('/product/{product}', 'ProductController@delete')->name('delete_product');


Route::get('/best-categories', 'BestCategoryController@index')->name('index_best_category');
Route::post('/best-category', 'BestCategoryController@store_BestCategory')->name('store_best_category');
Route::delete('/best-category/{best-category}', 'BestCategoryController@delete')->name('delete_best_category');


Route::get('/featured-products', 'FeaturedProductController@index')->name('index_featured_product');
Route::post('/featured-product', 'FeaturedProductController@store_FeaturedProduct')->name('store_featured_product');
Route::delete('/featured-product/{featured-product}', 'FeaturedProductController@delete')->name('delete_featured_product');


Route::get('/promo-products', 'PromoProductController@index')->name('index_promo_product');
Route::post('/promo-product', 'PromoProductController@store_PromoProduct')->name('store_promo_product');
Route::delete('/promo-product/{promo-product}', 'PromoProductController@delete')->name('delete_promo_product');

//Route::get('/check-promo', 'PromoProductController@check_product_promo_date')->name('check_promo');

Route::get('/related-products', 'RelatedProductController@related_products')->name('index_related_product');



Route::get('/most-viewed', 'MostViewedProductController@index')->name('index_most_view');
Route::post('/most-viewed', 'MostViewedProductController@store_MostView')->name('store_most_view');
Route::delete('/most-view/{most-view}', 'MostViewedProductController@delete')->name('delete_most_view');


Route::get('/product-reviews', 'ProductReviewController@product_reviews')->name('index_product_review');
Route::post('/product-review', 'ProductReviewController@store_product_review')->name('store_product_review');
Route::get('/product-review/{productReview}', 'ProductReviewController@show_product_review')->name('show_product_review');
Route::delete('/product-review/{productReview}', 'ProductReviewController@delete')->name('delete_product_review');


Route::get('/sponsored', 'SponsoredProductController@index')->name('index_sponsored');
Route::post('/sponsored', 'SponsoredProductController@store_SponsoredProduct')->name('store_sponsored');
Route::delete('/sponsored/{sponsored}', 'SponsoredProductController@delete')->name('delete_sponsored');


Route::get('/side-banners', 'BannerController@side_banners')->name('index_side_banner');
Route::post('/side-banner', 'BannerController@store_side_banner')->name('store_side_banner');
Route::get('/side-banner/{sideBanner}', 'BannerController@show_side_banner')->name('show_side_banner');
Route::delete('/side-banner/{sideBanner}', 'BannerController@delete_banner')->name('delete_side_banner');


Route::get('/people-choices', 'BannerController@people_choice')->name('index_peopleChoice');
Route::post('/people-choice', 'BannerController@store_PeoplesChoice')->name('store_peopleChoice');
Route::delete('/people-choice/{people-choice}', 'BannerController@delete_peoples_choice')->name('delete_peopleChoice');


Route::get('/home-sliders', 'BannerController@home_sliders')->name('index_homeslider');
Route::post('/home-slider', 'BannerController@store_home_slider')->name('store_homeslider');
Route::delete('/home-slider/{home-slider}', 'BannerController@delete_home_slider')->name('delete_homeslider');


Route::get('/add-to-cart/{product}', 'ProductController@getAddToCart')->name('add-to-cart');
Route::get('/shopping-cart', 'ProductController@getCart')->name('getCart');


Route::get('/checkout-page', 'PaymentController@getCheckout')->name('getCheckout');
//Route::post('/checkout', 'PaymentController@checkout')->name('checkout');


Route::get('/product-images', 'ProductImageController@index')->name('index_productImg');
Route::post('/product-images', 'ProductImageController@store_productimage')->name('store_productImg');
Route::get('/product-images/{image}', 'ProductImageController@show_productimage')->name('show_productImg');
Route::patch('/product-images/{image}', 'ProductImageController@update')->name('update_productImg');
Route::delete('/product-images/{image}', 'ProductImageController@delete')->name('delete_productImg');


Route::get('/stores', 'StoreController@index')->name('index_store');
Route::post('/store', 'StoreController@create_store')->name('create_store');
Route::get('/store/{store}', 'StoreController@show')->name('show_store');
Route::patch('/store/{store}', 'StoreController@update')->name('update_store');
Route::delete('/store/{store}', 'StoreController@delete')->name('delete_store');


Route::get('/orders', 'OrderController@index')->name('index_order');
Route::get('/order/{order}', 'OrderController@show')->name('show_order');
Route::patch('/order/{order}', 'OrderController@update')->name('update_order');


Route::get('/transactions', 'TransactionController@index')->name('transac');
Route::get('/transaction/{transaction}', 'TransactionController@show')->name('show_transac');
Route::patch('/transaction/{transaction}', 'TransactionController@update')->name('update_transac');


Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');



Route::get('/get_uniqueid', 'GenerateIdController@getUniqueId');




<?php

//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'SiteController@index')->name('home');
Route::get('/service/{slug?}', 'SiteController@services')->name('service');
Route::get('/product/', 'SiteController@product')->name('product');
Route::get('/faqs/', 'SiteController@faqs')->name('site_faqs');
Route::post('enquiry', 'SaveEnquiryController@store')->name('enquiry.store');
Route::get('/product/summary/{product}', 'SiteController@viewProductSummary')->name('view_product_summary');
Route::get('/product/{product}', 'SiteController@viewProduct')->name('view_product');
Route::get('/search_product', 'ProductSearchController@searchProduct')->name('public.search_product');

Route::get('/search', 'ProductSearchController@index')->name('public.product_list');



Route::get('/registration', 'UserRegistrationController@index')->name('public.registration');
Route::post('/registration', 'UserRegistrationController@create');
Route::get('/register/success/{id}', 'UserRegistrationController@registerationSuccess')->name('public.registration_success');
Route::get('/email/verify/{hash}', 'UserRegistrationController@verifyEmail')->name('public.verify_email');
Route::post('/email/resend', 'UserRegistrationController@resendEmailVerification')
         ->middleware('throttle:5,1')
         ->name('public.resend_email_verify');

Route::get('/login', 'UserLoginController@showLoginForm')->name('public.login');
Route::post('/login', 'UserLoginController@login');
Route::post('/logout', 'UserLoginController@logout')->name('public.logout');
Route::post('/forgot_password', 'UserLoginController@forgotPassword')->name('public.forgot_password')->middleware('throttle:5,1');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('/cart/checkout/', 'CartController@checkout')->name('public.cart.checkout');
Route::group(['middleware' => 'auth:web'], function() {
    Route::get('dashboard', 'UserController@dashboard')->name('public.dashboard');
    Route::get('change_password', 'UserController@changePassword')->name('public.change_password');
    Route::post('change_password', 'UserController@updatePassword');
    Route::put('profile', 'UserController@update')->name('public.update_profile');
    Route::get('pharma_create_order', 'PharmaOrderController@index')->name('public.pharma_purchase_order');
    Route::post('pharma_create_order', 'PharmaOrderController@create');
    Route::get('orders/{order}/download_invoice', 'UserOrderDetailController@download_invoice')->name('public.download_non_pharma_invoice');
    Route::get('orders', 'UserOrderDetailController@orderList')->name('public.order_list');

    Route::delete('pharma_order_delete/{order}', 'PharmaOrderController@orderCancel')->name('public.pharma_order_delete');
    Route::delete('order/{order}/removeOrder', 'UserOrderDetailController@orderCancel')->name('public.order_delete');

    //Cart
    Route::get('/cart/', 'CartController@list');
    Route::post('/cart/{product}/add', 'CartController@store');
    Route::delete('/cart/{product}/remove', 'CartController@delete');
    Route::put('/cart/{product}/update', 'CartController@update');
    Route::delete('/cart/removeAll', 'CartController@deleteAll');
    Route::post('/cart/sync_cart', 'CartController@syncCart');
    Route::put('/cart/{product}/update_status', 'CartController@updateStatus');
    Route::post('/cart/checkout', 'UserOrderController@checkout')->name('public.cart.checkout')
    ->middleware('throttle:5,1');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');


    Route::group(['middleware' => 'auth:admin_users'], function(){

        Route::get('dashboard', 'HomeController@index')->name('admin.dashboard');
        Route::put('faqs/update_sequence', 'FaqsController@updateSequence')->name('faqs.update_sequence');
        Route::resource('faqs', 'FaqsController');
        Route::resource('variation', 'VariationController');
        Route::put('category_types/update_sequence', 'CategoryTypeController@updateSequence')->name('category_types.update_sequence');
        Route::resource('category_types', 'CategoryTypeController');
        Route::put('sub_categories/update_sequence', 'SubCategoryController@updateSequence')->name('sub_categories.update_sequence');
        Route::resource('sub_categories', 'SubCategoryController');
        Route::put('brands/update_sequence', 'BrandController@updateSequence')->name('brands.update_sequence');
        Route::resource('brands', 'BrandController');
        Route::put('services/update_sequence', 'ServicesController@updateSequence')->name('faqs.update_sequence');
        Route::resource('services', 'ServicesController');
        Route::get('site_information', 'SiteInformationController@index')->name('site_information.index');
        Route::post('site_information', 'SiteInformationController@store')->name('site_information.store');
        Route::get('cart_settings', 'CartSettingController@index')->name('cart_settings.index');
        Route::post('cart_settings', 'CartSettingController@store')->name('cart_settings.store');
        Route::get('notification_manager', 'NotificationManagerController@index')->name('notification_manager.index');
        Route::post('notification_manager', 'NotificationManagerController@store')->name('notification_manager.store');
        Route::put('slider/update_sequence', 'SliderController@updateSequence')->name('slider.update_sequence');
        Route::resource('slider', 'SliderController');
        Route::resource('banner', 'BannerController');
        Route::resource('enquiries', 'EnquiriesController')->except('store');
        Route::resource('change_password_request', 'ChangePasswordRequestController')->except('store');

        Route::resource('testimonials', 'TestimonialController');
        Route::put('product/update_sequence', 'ProductController@updateSequence')->name('product.update_sequence');
        Route::post('product/get_slug_name', 'ProductController@getSlugName')->name('product.get_slug_name');

        Route::get('product/import_product', 'ProductController@import_product')->name('product.import');
        Route::post('product/import_product', 'ProductController@import');
        Route::post('product/import_image', 'ProductController@import_image')->name('product.import_image');
        Route::get('product/export', 'ProductController@export')->name('product.export');
        Route::resource('product', 'ProductController');
        Route::resource('home_pages', 'HomePageController');

        #HOME PAGE SECTION MANAGER
        Route::get('home_pages/{homePage}/load/tags/section', 'HomePageController@loadTagSection')->name('load_section');
        Route::get('home_pages/{homePage}/load/banner/section', 'HomePageController@loadBannerSection')->name('load_section');
        Route::get('home_pages/{homePage}/add_section', 'HomePageSectionController@create')->name('home_page_add_section');
        Route::post('home_pages/{homePage}/save_section', 'HomePageSectionController@storeSection')->name('home_page_save_section');
        Route::get('home_pages/{homePage}/make_default', 'HomePageController@makeDefault')->name('home_pages.make_default');

        ##UPDATE HOME PAGE SECTION CONTENT
        Route::PUT('home_pages/{homePage}/tag/{homePageSection}/update', 'HomePageSectionController@update')->name('home_page_update_section');

        ##TAG SECTION
        Route::get('home_pages/{homePage}/tag/{homePageSection}/edit', 'HomePageSectionController@editTag')->name('home_page_edit_tag_section');
        
        ##BANNER SECTION
        Route::get('home_pages/{homePage}/load/style/{styleId}/banner', 'HomePageSectionController@loadBannerStyle')->name('load_banner_style');
        Route::get('views/banner_styles/js/{fileName}', 'HomePageSectionController@loadJs')->name('load_banner_js_file');
        Route::get('home_pages/{homePage}/banner/{homePageSection}/edit', 'HomePageSectionController@editBanner')->name('home_page_edit_banner_section');

        ## SECTION MAKE VIEW
        Route::get('home_pages/{homePage}/section/{homePageSection}/render_view', 'HomePageSectionController@renderSection')->name('home_page_render_section');
        Route::get('home_pages/{homePage}/render_view', 'HomePageController@renderContent')->name('home_page_render_content');



        Route::delete('home_pages/{homePage}/home_page_section/{homePageSection}', 'HomePageSectionController@destroy')->name('home_page_delete_section');
        Route::put('home_pages/home_page_section/update_sequence', 'HomePageSectionController@updateSequence')->name('update_home_page_section_sequence');

        #HOME PAGE SECTION MANAGER ENDED HERE

        Route::put('product_images/update_sequence', 'PortfolioImageController@updateSequence')->name('product_images.update_sequence');
        Route::delete('product_images/{productImage}', 'PortfolioImageController@destroy')->name('portfolio_image.delete');

        Route::resource('pharma_orders', 'PharmaOrderAdminController')->except(['store', 'create', 'edit']);
        Route::get('user_orders/{order}/download_invoice', 'UserOrderAdminController@download_invoice')->name('user_orders.download_non_pharma_invoice');
        Route::resource('user_orders', 'UserOrderAdminController')->except(['store', 'create', 'edit']);

        Route::group(['middleware' => 'auth'], function () {
            Route::resource('admin_users', 'UserController', ['except' => ['show']]);
            Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
            Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
            Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
        });
        Route::get('users/export', 'UserControllerAdmin@export')->name('users.export');
        Route::resource('users', 'UserControllerAdmin')->except(['store', 'create', 'edit']);


    });

});


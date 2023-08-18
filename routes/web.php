<?php

//use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartSettingController;
use App\Http\Controllers\CategoryTypeController;
use App\Http\Controllers\ChangePasswordRequestController;
use App\Http\Controllers\EnquiriesController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\HomePageSectionController;
use App\Http\Controllers\NotificationManagerController;
use App\Http\Controllers\PharmaOrderAdminController;
use App\Http\Controllers\PharmaOrderController;
use App\Http\Controllers\PortfolioImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaveEnquiryController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SiteInformationController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserControllerAdmin;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserOrderAdminController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\UserOrderDetailController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\VariationController;
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

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/service/{slug?}', [SiteController::class, 'services'])->name('service');
Route::get('/product/', [SiteController::class, 'product'])->name('product');
Route::get('/faqs/', [SiteController::class, 'faqs'])->name('site_faqs');
Route::post('enquiry', [SaveEnquiryController::class, 'store'])->name('enquiry.store');
Route::get('/product/summary/{product}', [SiteController::class, 'viewProductSummary'])->name('view_product_summary');
Route::get('/product/{product}', [SiteController::class, 'viewProduct'])->name('view_product');
Route::get('/search_product', [ProductSearchController::class, 'searchProduct'])->name('public.search_product');

Route::get('/search', [ProductSearchController::class, 'index'])->name('public.product_list');

Route::get('/registration', [UserRegistrationController::class, 'index'])->name('public.registration');
Route::post('/registration', [UserRegistrationController::class, 'create']);
Route::get('/register/success/{id}', [UserRegistrationController::class, 'registerationSuccess'])->name('public.registration_success');
Route::get('/email/verify/{hash}', [UserRegistrationController::class, 'verifyEmail'])->name('public.verify_email');
Route::post('/email/resend', [UserRegistrationController::class, 'resendEmailVerification'])
         ->middleware('throttle:5,1')
         ->name('public.resend_email_verify');

Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('public.login');
Route::post('/login', [UserLoginController::class, 'login']);
Route::post('/logout', [UserLoginController::class, 'logout'])->name('public.logout');
Route::post('/forgot_password', [UserLoginController::class, 'forgotPassword'])->name('public.forgot_password')->middleware('throttle:5,1');
Route::get('password/reset', [Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [Auth\ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/cart/checkout/', [CartController::class, 'checkout'])->name('public.cart.checkout');
Route::middleware('auth:web')->group(function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('public.dashboard');
    Route::get('change_password', [UserController::class, 'changePassword'])->name('public.change_password');
    Route::post('change_password', [UserController::class, 'updatePassword']);
    Route::put('profile', [UserController::class, 'update'])->name('public.update_profile');
    Route::get('pharma_create_order', [PharmaOrderController::class, 'index'])->name('public.pharma_purchase_order');
    Route::post('pharma_create_order', [PharmaOrderController::class, 'create']);
    Route::get('orders/{order}/download_invoice', [UserOrderDetailController::class, 'download_invoice'])->name('public.download_non_pharma_invoice');
    Route::get('orders', [UserOrderDetailController::class, 'orderList'])->name('public.order_list');

    Route::delete('pharma_order_delete/{order}', [PharmaOrderController::class, 'orderCancel'])->name('public.pharma_order_delete');
    Route::delete('order/{order}/removeOrder', [UserOrderDetailController::class, 'orderCancel'])->name('public.order_delete');

    //Cart
    Route::get('/cart/', [CartController::class, 'list']);
    Route::post('/cart/{product}/add', [CartController::class, 'store']);
    Route::delete('/cart/{product}/remove', [CartController::class, 'delete']);
    Route::put('/cart/{product}/update', [CartController::class, 'update']);
    Route::delete('/cart/removeAll', [CartController::class, 'deleteAll']);
    Route::post('/cart/sync_cart', [CartController::class, 'syncCart']);
    Route::put('/cart/{product}/update_status', [CartController::class, 'updateStatus']);
    Route::post('/cart/checkout', [UserOrderController::class, 'checkout'])->name('public.cart.checkout')
    ->middleware('throttle:5,1');
});

Route::prefix('admin')->group(function () {
    Route::get('login', [Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [Auth\LoginController::class, 'login']);
    Route::post('logout', [Auth\LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin_users')->group(function () {
        Route::get('dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::put('faqs/update_sequence', [FaqsController::class, 'updateSequence'])->name('faqs.update_sequence');
        Route::resource('faqs', FaqsController::class);
        Route::resource('variation', VariationController::class);
        Route::put('category_types/update_sequence', [CategoryTypeController::class, 'updateSequence'])->name('category_types.update_sequence');
        Route::resource('category_types', CategoryTypeController::class);
        Route::put('sub_categories/update_sequence', [SubCategoryController::class, 'updateSequence'])->name('sub_categories.update_sequence');
        Route::resource('sub_categories', SubCategoryController::class);
        Route::put('brands/update_sequence', [BrandController::class, 'updateSequence'])->name('brands.update_sequence');
        Route::resource('brands', BrandController::class);
        Route::put('services/update_sequence', [ServicesController::class, 'updateSequence'])->name('faqs.update_sequence');
        Route::resource('services', ServicesController::class);
        Route::get('site_information', [SiteInformationController::class, 'index'])->name('site_information.index');
        Route::post('site_information', [SiteInformationController::class, 'store'])->name('site_information.store');
        Route::get('cart_settings', [CartSettingController::class, 'index'])->name('cart_settings.index');
        Route::post('cart_settings', [CartSettingController::class, 'store'])->name('cart_settings.store');
        Route::get('notification_manager', [NotificationManagerController::class, 'index'])->name('notification_manager.index');
        Route::post('notification_manager', [NotificationManagerController::class, 'store'])->name('notification_manager.store');
        Route::put('slider/update_sequence', [SliderController::class, 'updateSequence'])->name('slider.update_sequence');
        Route::resource('slider', SliderController::class);
        Route::resource('banner', BannerController::class);
        Route::resource('enquiries', EnquiriesController::class)->except('store');
        Route::resource('change_password_request', ChangePasswordRequestController::class)->except('store');

        Route::resource('testimonials', TestimonialController::class);
        Route::put('product/update_sequence', [ProductController::class, 'updateSequence'])->name('product.update_sequence');
        Route::post('product/get_slug_name', [ProductController::class, 'getSlugName'])->name('product.get_slug_name');

        Route::get('product/import_product', [ProductController::class, 'import_product'])->name('product.import');
        Route::post('product/import_product', [ProductController::class, 'import']);
        Route::post('product/import_image', [ProductController::class, 'import_image'])->name('product.import_image');
        Route::get('product/export', [ProductController::class, 'export'])->name('product.export');
        Route::resource('product', ProductController::class);
        Route::resource('home_pages', HomePageController::class);

        //HOME PAGE SECTION MANAGER
        Route::get('home_pages/{homePage}/load/tags/section', [HomePageController::class, 'loadTagSection'])->name('load_section');
        Route::get('home_pages/{homePage}/load/banner/section', [HomePageController::class, 'loadBannerSection'])->name('load_section');
        Route::get('home_pages/{homePage}/add_section', [HomePageSectionController::class, 'create'])->name('home_page_add_section');
        Route::post('home_pages/{homePage}/save_section', [HomePageSectionController::class, 'storeSection'])->name('home_page_save_section');
        Route::get('home_pages/{homePage}/make_default', [HomePageController::class, 'makeDefault'])->name('home_pages.make_default');

        //#UPDATE HOME PAGE SECTION CONTENT
        Route::PUT('home_pages/{homePage}/tag/{homePageSection}/update', [HomePageSectionController::class, 'update'])->name('home_page_update_section');

        //#TAG SECTION
        Route::get('home_pages/{homePage}/tag/{homePageSection}/edit', [HomePageSectionController::class, 'editTag'])->name('home_page_edit_tag_section');

        //#BANNER SECTION
        Route::get('home_pages/{homePage}/load/style/{styleId}/banner', [HomePageSectionController::class, 'loadBannerStyle'])->name('load_banner_style');
        Route::get('views/banner_styles/js/{fileName}', [HomePageSectionController::class, 'loadJs'])->name('load_banner_js_file');
        Route::get('home_pages/{homePage}/banner/{homePageSection}/edit', [HomePageSectionController::class, 'editBanner'])->name('home_page_edit_banner_section');

        //# SECTION MAKE VIEW
        Route::get('home_pages/{homePage}/section/{homePageSection}/render_view', [HomePageSectionController::class, 'renderSection'])->name('home_page_render_section');
        Route::get('home_pages/{homePage}/render_view', [HomePageController::class, 'renderContent'])->name('home_page_render_content');

        Route::delete('home_pages/{homePage}/home_page_section/{homePageSection}', [HomePageSectionController::class, 'destroy'])->name('home_page_delete_section');
        Route::put('home_pages/home_page_section/update_sequence', [HomePageSectionController::class, 'updateSequence'])->name('update_home_page_section_sequence');

        //HOME PAGE SECTION MANAGER ENDED HERE

        Route::put('product_images/update_sequence', [PortfolioImageController::class, 'updateSequence'])->name('product_images.update_sequence');
        Route::delete('product_images/{productImage}', [PortfolioImageController::class, 'destroy'])->name('portfolio_image.delete');

        Route::resource('pharma_orders', PharmaOrderAdminController::class)->except(['store', 'create', 'edit']);
        Route::get('user_orders/{order}/download_invoice', [UserOrderAdminController::class, 'download_invoice'])->name('user_orders.download_non_pharma_invoice');
        Route::resource('user_orders', UserOrderAdminController::class)->except(['store', 'create', 'edit']);

        Route::middleware('auth')->group(function () {
            Route::resource('admin_users', UserController::class)->except('show');
            Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::put('profile/password', [ProfileController::class, 'password'])->name('profile.password');
        });
        Route::get('users/export', [UserControllerAdmin::class, 'export'])->name('users.export');
        Route::resource('users', UserControllerAdmin::class)->except(['store', 'create', 'edit']);
    });
});

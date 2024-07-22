<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/','/fr');

Route::group([
    'prefix' => '{locale}',
    'middleware' => 'Index',
], function() {

    Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('home');

    Route::get( '/home', [App\Http\Controllers\IndexController::class, 'index'])->name('home');

    Route::get('/contacts', [App\Http\Controllers\ContactsController::class, 'index'])->name('contacts');

    Route::get('/about-us', [App\Http\Controllers\AboutUsController::class, 'index'])->name('about-us');

    Route::get('/services/{url?}', [App\Http\Controllers\ServicesController::class, 'index'])->name('services');

    Route::get('/error', [App\Http\Controllers\ErrorController::class, 'index'])->name('error');

    Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])->name('account');
    Route::get('/payment', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment');

    Route::get('/terms-and-conditions', [App\Http\Controllers\TermsAndConditionsController::class, 'index'])->name('terms-and-conditions');
    Route::get('/privacy-policy', [App\Http\Controllers\PolitiqueConfidenaliteController::class, 'index'])->name('politique-confidenalite');
    Route::get('/cookie-policy', [App\Http\Controllers\CookiePolicyController::class, 'index'])->name('cookie-policy');
    Route::get('/code-de-conduite', [App\Http\Controllers\CodeDeConduiteController::class, 'index'])->name('code-de-conduite');

    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');

    Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');

    Route::post('/checkout/action', [App\Http\Controllers\CheckoutController::class, 'action'])->name('checkout-action');

    Route::get('/checkout/success', [App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout-success');

    Route::get('/checkout/error', [App\Http\Controllers\CheckoutController::class, 'error'])->name('checkout-error');

    Route::get('/terms-and-conditions', [App\Http\Controllers\TermsAndConditionsController::class, 'index'])->name('terms-and-conditions');

    Route::match(['get', 'post'], '/search', [App\Http\Controllers\ServicesController::class, 'search'])->name('search');

    Route::post('/send-message', [App\Http\Controllers\SendController::class, 'message'])->name('send-message');

    Route::post('/subscribe', [App\Http\Controllers\SendController::class, 'subscribe'])->name('send-subscribe');

    Route::post('/write-review/{id}', [App\Http\Controllers\SendController::class, 'review'])->name('send-review');

    Route::post('/change-address', [App\Http\Controllers\SendController::class, 'change_address'])->name('change-address');

    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

    Route::get('/log-out', [App\Http\Controllers\AccountController::class, 'log_out'])->name('log-out');

    Route::get('/verify/{email}', [App\Http\Controllers\AccountController::class, 'verify'])->name('verify');

    Route::post('/resend', [App\Http\Controllers\AccountController::class, 'resend'])->name('resend');

    Route::post('/forget-password', [App\Http\Controllers\Auth\LoginController::class, 'forget_password'])->name('forget-password');
    Route::get('/card-verify', [App\Http\Controllers\AccountController::class, 'card_verify'])->name('card-verify');

    Route::get('/reset-password/{email}', [App\Http\Controllers\Auth\LoginController::class, 'reset_password'])->name('reset-password');

    Route::post('/reset-password-update', [App\Http\Controllers\Auth\LoginController::class, 'reset_password_update'])->name('reset-password-update');

    Route::post('/account/change', [App\Http\Controllers\AccountController::class, 'update'])->name('account-change');

    Route::post('/account/pay', [App\Http\Controllers\AccountController::class, 'payOrder'])->name('account-pay');

    Route::post('/account/set-status', [App\Http\Controllers\AccountController::class, 'set_status'])->name('set-status');

    Route::any('/register', [App\Http\Controllers\Auth\RegisterController::class])->name('register');

    Route::post('/change-address', [App\Http\Controllers\SendController::class, 'change_address'])->name('change-address');

    Route::post('/change-account-data', [App\Http\Controllers\AccountController::class, 'change_account_data'])->name('change-account-data');

    Route::post('/change-account-secondary-data', [App\Http\Controllers\AccountController::class, 'change_account_secondary_data'])->name('change-account-secondary-data');

    Route::post('/change-account-secondary-data-docs', [App\Http\Controllers\AccountController::class, 'change_account_secondary_data_docs'])->name('change-account-secondary-data-docs');

    Route::post('/change-image', [App\Http\Controllers\AccountController::class, 'change_image'])->name('change-image');

    Route::post('/confirm-terms', [App\Http\Controllers\AccountController::class, 'confirm_terms'])->name('confirm-terms');

    Route::get('/pdf/{id}', [App\Http\Controllers\AccountController::class, 'pdf'])->name('download-pdf');

    Route::get('/download-data/{id}/{file}', [App\Http\Controllers\AccountController::class, 'download_data'])->name('download-data');

    Route::post('/update-description/{id}', [App\Http\Controllers\AccountController::class, 'update_description'])->name('update-description');

    Auth::routes();

    // Home
    Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home-admin-index');
    Route::get('/admin/home/show/{id}', [App\Http\Controllers\Admin\HomeController::class, 'show'])->name('home-admin-show');
    Route::post('/admin/home/update/{id}', [App\Http\Controllers\Admin\HomeController::class, 'update'])->name('home-admin-update');
    Route::post('/admin/home/store', [App\Http\Controllers\Admin\HomeController::class, 'store'])->name('home-admin-store');
    Route::get('/admin/home/destroy/{id}', [App\Http\Controllers\Admin\HomeController::class, 'destroy'])->name('home-admin-destroy');

    // About Us
    Route::get('/admin/about-us', [App\Http\Controllers\Admin\AboutUsController::class, 'index'])->name('about-us-admin-index');
    Route::get('/admin/about-us/show/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'show'])->name('about-us-admin-show');
    Route::post('/admin/about-us/update/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'update'])->name('about-us-admin-update');
    Route::post('/admin/about-us/store', [App\Http\Controllers\Admin\AboutUsController::class, 'store'])->name('about-us-admin-store');
    Route::get('/admin/about-us/destroy/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'destroy'])->name('about-us-admin-destroy');

    // Phone NUmbers
    Route::get('/admin/phone-numbers', [App\Http\Controllers\Admin\PhoneNumbersController::class, 'index'])->name('phone-numbers-admin-index');
    Route::get('/admin/phone-numbers/show/{id}', [App\Http\Controllers\Admin\PhoneNumbersController::class, 'show'])->name('phone-numbers-admin-show');
    Route::post('/admin/phone-numbers/update/{id}', [App\Http\Controllers\Admin\PhoneNumbersController::class, 'update'])->name('phone-numbers-admin-update');
    Route::post('/admin/phone-numbers/store', [App\Http\Controllers\Admin\PhoneNumbersController::class, 'store'])->name('phone-numbers-admin-store');
    Route::get('/admin/phone-numbers/destroy/{id}', [App\Http\Controllers\Admin\PhoneNumbersController::class, 'destroy'])->name('phone-numbers-admin-destroy');

    // About Us Description
    Route::get('/admin/about-us-description', [App\Http\Controllers\Admin\AboutUsDescriptionController::class, 'index'])->name('about-us-description-admin-index');
    Route::get('/admin/about-us-description/show/{id}', [App\Http\Controllers\Admin\AboutUsDescriptionController::class, 'show'])->name('about-us-description-admin-show');
    Route::post('/admin/about-us-description/update/{id}', [App\Http\Controllers\Admin\AboutUsDescriptionController::class, 'update'])->name('about-us-description-admin-update');
    Route::post('/admin/about-us-description/store', [App\Http\Controllers\Admin\AboutUsDescriptionController::class, 'store'])->name('about-us-description-admin-store');
    Route::get('/admin/about-us-description/destroy/{id}', [App\Http\Controllers\Admin\AboutUsDescriptionController::class, 'destroy'])->name('about-us-description-admin-destroy');

    // Years of Expreiance
    Route::get('/admin/years-of-experiance', [App\Http\Controllers\Admin\YearsOfExperianceController::class, 'index'])->name('years-of-experiance-admin-index');
    Route::get('/admin/years-of-experiance/show/{id}', [App\Http\Controllers\Admin\YearsOfExperianceController::class, 'show'])->name('years-of-experiance-admin-show');
    Route::post('/admin/years-of-experiance/update/{id}', [App\Http\Controllers\Admin\YearsOfExperianceController::class, 'update'])->name('years-of-experiance-admin-update');
    Route::post('/admin/years-of-experiance/store', [App\Http\Controllers\Admin\YearsOfExperianceController::class, 'store'])->name('years-of-experiance-admin-store');
    Route::get('/admin/years-of-experiance/destroy/{id}', [App\Http\Controllers\Admin\YearsOfExperianceController::class, 'destroy'])->name('years-of-experiance-admin-destroy');

    // Contact Datas Social Accounts
    Route::get('/admin/social-accounts', [App\Http\Controllers\Admin\SocialAccountsController::class, 'index'])->name('social-accounts-admin-index');
    Route::get('/admin/social-accounts/show/{id}', [App\Http\Controllers\Admin\SocialAccountsController::class, 'show'])->name('social-accounts-admin-show');
    Route::post('/admin/social-accounts/update/{id}', [App\Http\Controllers\Admin\SocialAccountsController::class, 'update'])->name('social-accounts-admin-update');
    Route::post('/admin/social-accounts/store', [App\Http\Controllers\Admin\SocialAccountsController::class, 'store'])->name('social-accounts-admin-store');
    Route::get('/admin/social-accounts/destroy/{id}', [App\Http\Controllers\Admin\SocialAccountsController::class, 'destroy'])->name('social-accounts-admin-destroy');

    // Cities
    Route::get('/admin/cities', [App\Http\Controllers\Admin\CitiesController::class, 'index'])->name('cities-admin-index');
    Route::get('/admin/cities/show/{id}', [App\Http\Controllers\Admin\CitiesController::class, 'show'])->name('cities-admin-show');
    Route::post('/admin/cities/update/{id}', [App\Http\Controllers\Admin\CitiesController::class, 'update'])->name('cities-admin-update');
    Route::post('/admin/cities/store', [App\Http\Controllers\Admin\CitiesController::class, 'store'])->name('cities-admin-store');
    Route::get('/admin/cities/destroy/{id}', [App\Http\Controllers\Admin\CitiesController::class, 'destroy'])->name('cities-admin-destroy');

    // Partners
    Route::get('/admin/partners', [App\Http\Controllers\Admin\PartnersController::class, 'index'])->name('partners-admin-index');
    Route::get('/admin/partners/activate', [App\Http\Controllers\Admin\PartnersController::class, 'activate'])->name('partners-admin-activate');
    Route::get('/admin/partners/show/{id}', [App\Http\Controllers\Admin\PartnersController::class, 'show'])->name('partners-admin-show');
    Route::post('/admin/partners/update/{id}', [App\Http\Controllers\Admin\PartnersController::class, 'update'])->name('partners-admin-update');
    Route::post('/admin/partners/store', [App\Http\Controllers\Admin\PartnersController::class, 'store'])->name('partners-admin-store');
    Route::get('/admin/partners/destroy/{id}', [App\Http\Controllers\Admin\PartnersController::class, 'destroy'])->name('partners-admin-destroy');

    // Blog
    Route::get('/admin/blog', [App\Http\Controllers\Admin\BlogsController::class, 'index'])->name('blog-admin-index');
    Route::get('/admin/blog/show/{id}', [App\Http\Controllers\Admin\BlogsController::class, 'show'])->name('blog-admin-show');
    Route::post('/admin/blog/update/{id}', [App\Http\Controllers\Admin\BlogsController::class, 'update'])->name('blog-admin-update');
    Route::post('/admin/blog/update-image/{id}', [App\Http\Controllers\Admin\BlogsController::class, 'update_image'])->name('blog-admin-update-image');
    Route::post('/admin/blog/update-embed/{id}', [App\Http\Controllers\Admin\BlogsController::class, 'update_embed'])->name('blog-admin-update-embed');
    Route::post('/admin/blog/store', [App\Http\Controllers\Admin\BlogsController::class, 'store'])->name('blog-admin-store');
    Route::get('/admin/blog/destroy/{id}', [App\Http\Controllers\Admin\BlogsController::class, 'destroy'])->name('blog-admin-destroy');
    Route::get('/admin/blog/destroy-image/{id}', [App\Http\Controllers\Admin\BlogsController::class, 'destroy_image'])->name('blog-admin-destroy-image');
    Route::get('/admin/blog/destroy-embed/{id}', [App\Http\Controllers\Admin\BlogsController::class, 'destroy_embed'])->name('blog-admin-destroy-embed');

    // Contact Data
    Route::get('/admin/contact-data', [App\Http\Controllers\Admin\ContactDataController::class, 'index'])->name('contact-data-admin-index');
    Route::get('/admin/contact-data/show/{id}', [App\Http\Controllers\Admin\ContactDataController::class, 'show'])->name('contact-data-admin-show');
    Route::post('/admin/contact-data/update/{id}', [App\Http\Controllers\Admin\ContactDataController::class, 'update'])->name('contact-data-admin-update');
    Route::post('/admin/contact-data/store', [App\Http\Controllers\Admin\ContactDataController::class, 'store'])->name('contact-data-admin-store');
    Route::get('/admin/contact-data/destroy/{id}', [App\Http\Controllers\Admin\ContactDataController::class, 'destroy'])->name('contact-data-admin-destroy');

    // Subscribers
    Route::get('/admin/subscribers', [App\Http\Controllers\Admin\SubscribersController::class, 'index'])->name('subscribers-admin-index');
    Route::get('/admin/subscribers/show/{id}', [App\Http\Controllers\Admin\SubscribersController::class, 'show'])->name('subscribers-admin-show');
    Route::post('/admin/subscribers/update/{id}', [App\Http\Controllers\Admin\SubscribersController::class, 'update'])->name('subscribers-admin-update');
    Route::post('/admin/subscribers/store', [App\Http\Controllers\Admin\SubscribersController::class, 'store'])->name('subscribers-admin-store');
    Route::get('/admin/subscribers/destroy/{id}', [App\Http\Controllers\Admin\SubscribersController::class, 'destroy'])->name('subscribers-admin-destroy');

    // Card Datas
    Route::get('/admin/card-datas', [App\Http\Controllers\Admin\CardDatasController::class, 'index'])->name('card-datas-admin-index');
    Route::get('/admin/card-datas/show/{id}', [App\Http\Controllers\Admin\CardDatasController::class, 'show'])->name('card-datas-admin-show');
    Route::post('/admin/card-datas/update/{id}', [App\Http\Controllers\Admin\CardDatasController::class, 'update'])->name('card-datas-admin-update');
    Route::post('/admin/card-datas/store', [App\Http\Controllers\Admin\CardDatasController::class, 'store'])->name('card-datas-admin-store');
    Route::get('/admin/card-datas/destroy/{id}', [App\Http\Controllers\Admin\CardDatasController::class, 'destroy'])->name('card-datas-admin-destroy');

    // Messages
    Route::get('/admin/messages', [App\Http\Controllers\Admin\MessagesController::class, 'index'])->name('messages-admin-index');
    Route::get('/admin/messages/show/{id}', [App\Http\Controllers\Admin\MessagesController::class, 'show'])->name('messages-admin-show');
    Route::get('/admin/messages/update/{id}', [App\Http\Controllers\Admin\MessagesController::class, 'update'])->name('messages-admin-update');
    Route::post('/admin/messages/store', [App\Http\Controllers\Admin\MessagesController::class, 'store'])->name('messages-admin-store');
    Route::get('/admin/messages/destroy/{id}', [App\Http\Controllers\Admin\MessagesController::class, 'destroy'])->name('messages-admin-destroy');

    // Menu
    Route::get('/admin/menu', [App\Http\Controllers\Admin\MenuController::class, 'index'])->name('menu-admin-index');
    Route::get('/admin/menu/show/{id}', [App\Http\Controllers\Admin\MenuController::class, 'show'])->name('menu-admin-show');
    Route::post('/admin/menu/update/{id}', [App\Http\Controllers\Admin\MenuController::class, 'update'])->name('menu-admin-update');
    Route::post('/admin/menu/store', [App\Http\Controllers\Admin\MenuController::class, 'store'])->name('menu-admin-store');
    Route::get('/admin/menu/destroy/{id}', [App\Http\Controllers\Admin\MenuController::class, 'destroy'])->name('menu-admin-destroy');

    // Slider
    Route::get('/admin/slider', [App\Http\Controllers\Admin\SliderController::class, 'index'])->name('slider-admin-index');
    Route::get('/admin/slider/show/{id}', [App\Http\Controllers\Admin\SliderController::class, 'show'])->name('slider-admin-show');
    Route::post('/admin/slider/update/{id}', [App\Http\Controllers\Admin\SliderController::class, 'update'])->name('slider-admin-update');
    Route::post('/admin/slider/store', [App\Http\Controllers\Admin\SliderController::class, 'store'])->name('slider-admin-store');
    Route::get('/admin/slider/destroy/{id}', [App\Http\Controllers\Admin\SliderController::class, 'destroy'])->name('slider-admin-destroy');

    // Map
    Route::get('/admin/map', [App\Http\Controllers\Admin\MapController::class, 'index'])->name('map-admin-index');
    Route::get('/admin/map/show/{id}', [App\Http\Controllers\Admin\MapController::class, 'show'])->name('map-admin-show');
    Route::post('/admin/map/update/{id}', [App\Http\Controllers\Admin\MapController::class, 'update'])->name('map-admin-update');
    Route::post('/admin/map/store', [App\Http\Controllers\Admin\MapController::class, 'store'])->name('map-admin-store');
    Route::get('/admin/map/destroy/{id}', [App\Http\Controllers\Admin\MapController::class, 'destroy'])->name('map-admin-destroy');

    // Privacy Policy
    Route::get('/admin/privacy-policy', [App\Http\Controllers\Admin\PrivacyPolicyController::class, 'index'])->name('privacy-policy-admin-index');
    Route::get('/admin/privacy-policy/show/{id}', [App\Http\Controllers\Admin\PrivacyPolicyController::class, 'show'])->name('privacy-policy-admin-show');
    Route::post('/admin/privacy-policy/update/{id}', [App\Http\Controllers\Admin\PrivacyPolicyController::class, 'update'])->name('privacy-policy-admin-update');
    Route::post('/admin/privacy-policy/store', [App\Http\Controllers\Admin\PrivacyPolicyController::class, 'store'])->name('privacy-policy-admin-store');
    Route::get('/admin/privacy-policy/destroy/{id}', [App\Http\Controllers\Admin\PrivacyPolicyController::class, 'destroy'])->name('privacy-policy-admin-destroy');

    Route::get('/admin/politique-confidenalite', [App\Http\Controllers\Admin\PolitiqueConfidenaliteController::class, 'index'])->name('politique-confidenalite-admin-index');
    Route::get('/admin/politique-confidenalite/show/{id}', [App\Http\Controllers\Admin\PolitiqueConfidenaliteController::class, 'show'])->name('politique-confidenalite-admin-show');
    Route::post('/admin/politique-confidenalite/update/{id}', [App\Http\Controllers\Admin\PolitiqueConfidenaliteController::class, 'update'])->name('politique-confidenalite-admin-update');
    Route::post('/admin/politique-confidenalite/store', [App\Http\Controllers\Admin\PolitiqueConfidenaliteController::class, 'store'])->name('politique-confidenalite-admin-store');
    Route::get('/admin/politique-confidenalite/destroy/{id}', [App\Http\Controllers\Admin\PolitiqueConfidenaliteController::class, 'destroy'])->name('politique-confidenalite-admin-destroy');

    Route::get('/admin/cookie-policy', [App\Http\Controllers\Admin\CookiePolicyController::class, 'index'])->name('cookie-policy-admin-index');
    Route::get('/admin/cookie-policy/show/{id}', [App\Http\Controllers\Admin\CookiePolicyController::class, 'show'])->name('cookie-policy-admin-show');
    Route::post('/admin/cookie-policy/update/{id}', [App\Http\Controllers\Admin\CookiePolicyController::class, 'update'])->name('cookie-policy-admin-update');
    Route::post('/admin/cookie-policy/store', [App\Http\Controllers\Admin\CookiePolicyController::class, 'store'])->name('cookie-policy-admin-store');
    Route::get('/admin/cookie-policy/destroy/{id}', [App\Http\Controllers\Admin\CookiePolicyController::class, 'destroy'])->name('cookie-policy-admin-destroy');

    Route::get('/admin/code-de-conduite', [App\Http\Controllers\Admin\CodeDeConduiteController::class, 'index'])->name('code-de-conduite-admin-index');
    Route::get('/admin/code-de-conduite/show/{id}', [App\Http\Controllers\Admin\CodeDeConduiteController::class, 'show'])->name('code-de-conduite-admin-show');
    Route::post('/admin/code-de-conduite/update/{id}', [App\Http\Controllers\Admin\CodeDeConduiteController::class, 'update'])->name('code-de-conduite-admin-update');
    Route::post('/admin/code-de-conduite/store', [App\Http\Controllers\Admin\CodeDeConduiteController::class, 'store'])->name('code-de-conduite-admin-store');
    Route::get('/admin/code-de-conduite/destroy/{id}', [App\Http\Controllers\Admin\CodeDeConduiteController::class, 'destroy'])->name('code-de-conduite-admin-destroy');

    // Privacy Policy Items
    Route::get('/admin/privacy-policy-items', [App\Http\Controllers\Admin\TermsAndConditionsItemsController::class, 'index'])->name('privacy-policy-items-admin-index');
    Route::get('/admin/privacy-policy-items/show/{id}', [App\Http\Controllers\Admin\TermsAndConditionsItemsController::class, 'show'])->name('privacy-policy-items-admin-show');
    Route::post('/admin/privacy-policy-items/update/{id}', [App\Http\Controllers\Admin\TermsAndConditionsItemsController::class, 'update'])->name('privacy-policy-items-admin-update');
    Route::post('/admin/privacy-policy-items/store', [App\Http\Controllers\Admin\TermsAndConditionsItemsController::class, 'store'])->name('privacy-policy-items-admin-store');
    Route::get('/admin/privacy-policy-items/destroy/{id}', [App\Http\Controllers\Admin\TermsAndConditionsItemsController::class, 'destroy'])->name('privacy-policy-items-admin-destroy');

    // Translations
    Route::get('/admin/translations', [App\Http\Controllers\Admin\TranslationsController::class, 'index'])->name('translations-admin-index');
    Route::get('/admin/translations/show/{id}', [App\Http\Controllers\Admin\TranslationsController::class, 'show'])->name('translations-admin-show');
    Route::post('/admin/translations/update/{id}', [App\Http\Controllers\Admin\TranslationsController::class, 'update'])->name('translations-admin-update');
    Route::post('/admin/translations/store', [App\Http\Controllers\Admin\TranslationsController::class, 'store'])->name('translations-admin-store');
    Route::get('/admin/translations/destroy/{id}', [App\Http\Controllers\Admin\TranslationsController::class, 'destroy'])->name('translations-admin-destroy');

    // SEO
    Route::get('/admin/seo', [App\Http\Controllers\Admin\SeoController::class, 'index'])->name('seo-admin-index');
    Route::get('/admin/seo/show/{id}', [App\Http\Controllers\Admin\SeoController::class, 'show'])->name('seo-admin-show');
    Route::post('/admin/seo/update/{id}', [App\Http\Controllers\Admin\SeoController::class, 'update'])->name('seo-admin-update');
    Route::post('/admin/seo/store', [App\Http\Controllers\Admin\SeoController::class, 'store'])->name('seo-admin-store');
    Route::get('/admin/seo/destroy/{id}', [App\Http\Controllers\Admin\SeoController::class, 'destroy'])->name('seo-admin-destroy');

    // Orders
    Route::get('/admin/orders', [App\Http\Controllers\Admin\OrdersController::class, 'index'])->name('orders-admin-index');
    Route::get('/admin/orders/show/{id}', [App\Http\Controllers\Admin\OrdersController::class, 'show'])->name('orders-admin-show');
    Route::post('/admin/orders/update/{id}', [App\Http\Controllers\Admin\OrdersController::class, 'update'])->name('orders-admin-update');
    Route::post('/admin/orders/store', [App\Http\Controllers\Admin\OrdersController::class, 'store'])->name('orders-admin-store');
    Route::get('/admin/orders/destroy/{id}', [App\Http\Controllers\Admin\OrdersController::class, 'destroy'])->name('orders-admin-destroy');

    // Services
    Route::get('/admin/services', [App\Http\Controllers\Admin\ServicesController::class, 'index'])->name('services-admin-index');
    Route::get('/admin/services/show/{id}', [App\Http\Controllers\Admin\ServicesController::class, 'show'])->name('services-admin-show');
    Route::post('/admin/services/update/{id}', [App\Http\Controllers\Admin\ServicesController::class, 'update'])->name('services-admin-update');
    Route::post('/admin/services/store', [App\Http\Controllers\Admin\ServicesController::class, 'store'])->name('services-admin-store');
    Route::get('/admin/services/destroy/{id}', [App\Http\Controllers\Admin\ServicesController::class, 'destroy'])->name('services-admin-destroy');

    // Services Items
    Route::get('/admin/services-items', [App\Http\Controllers\Admin\ServicesItemsController::class, 'index'])->name('services-items-admin-index');
    Route::get('/admin/services-items/show/{id}', [App\Http\Controllers\Admin\ServicesItemsController::class, 'show'])->name('services-items-admin-show');
    Route::post('/admin/services-items/update/{id}', [App\Http\Controllers\Admin\ServicesItemsController::class, 'update'])->name('services-items-admin-update');
    Route::post('/admin/services-items/store', [App\Http\Controllers\Admin\ServicesItemsController::class, 'store'])->name('services-items-admin-store');
    Route::get('/admin/services-items/destroy/{id}', [App\Http\Controllers\Admin\ServicesItemsController::class, 'destroy'])->name('services-items-admin-destroy');

    // Call Orders
    Route::get('/admin/call-orders', [App\Http\Controllers\Admin\CallOrdersController::class, 'index'])->name('call-orders-admin-index');
    Route::get('/admin/call-orders/show/{id}', [App\Http\Controllers\Admin\CallOrdersController::class, 'show'])->name('call-orders-admin-show');
    Route::get('/admin/call-orders/update/{id}', [App\Http\Controllers\Admin\CallOrdersController::class, 'update'])->name('call-orders-admin-update');
    Route::post('/admin/call-orders/store', [App\Http\Controllers\Admin\CallOrdersController::class, 'store'])->name('call-orders-admin-store');
    Route::get('/admin/call-orders/destroy/{id}', [App\Http\Controllers\Admin\CallOrdersController::class, 'destroy'])->name('call-orders-admin-destroy');

    // Category Teaser
    Route::get('/admin/category-teaser', [App\Http\Controllers\Admin\CategoryTeaserController::class, 'index'])->name('category-teaser-admin-index');
    Route::get('/admin/category-teaser/show/{id}', [App\Http\Controllers\Admin\CategoryTeaserController::class, 'show'])->name('category-teaser-admin-show');
    Route::post('/admin/category-teaser/update/{id}', [App\Http\Controllers\Admin\CategoryTeaserController::class, 'update'])->name('category-teaser-admin-update');
    Route::post('/admin/category-teaser/store', [App\Http\Controllers\Admin\CategoryTeaserController::class, 'store'])->name('category-teaser-admin-store');
    Route::get('/admin/category-teaser/destroy/{id}', [App\Http\Controllers\Admin\CategoryTeaserController::class, 'destroy'])->name('category-teaser-admin-destroy');

    // Day Offer
    Route::get('/admin/day-offer', [App\Http\Controllers\Admin\DayOfferController::class, 'index'])->name('day-offer-admin-index');
    Route::get('/admin/day-offer/show/{id}', [App\Http\Controllers\Admin\DayOfferController::class, 'show'])->name('day-offer-admin-show');
    Route::post('/admin/day-offer/update/{id}', [App\Http\Controllers\Admin\DayOfferController::class, 'update'])->name('day-offer-admin-update');
    Route::post('/admin/day-offer/store', [App\Http\Controllers\Admin\DayOfferController::class, 'store'])->name('day-offer-admin-store');
    Route::get('/admin/day-offer/destroy/{id}', [App\Http\Controllers\Admin\DayOfferController::class, 'destroy'])->name('day-offer-admin-destroy');

    // Footer Links
    Route::get('/admin/footer-links', [App\Http\Controllers\Admin\FooterLinksController::class, 'index'])->name('footer-links-admin-index');
    Route::get('/admin/footer-links/show/{id}', [App\Http\Controllers\Admin\FooterLinksController::class, 'show'])->name('footer-links-admin-show');
    Route::post('/admin/footer-links/update/{id}', [App\Http\Controllers\Admin\FooterLinksController::class, 'update'])->name('footer-links-admin-update');
    Route::post('/admin/footer-links/store', [App\Http\Controllers\Admin\FooterLinksController::class, 'store'])->name('footer-links-admin-store');
    Route::get('/admin/footer-links/destroy/{id}', [App\Http\Controllers\Admin\FooterLinksController::class, 'destroy'])->name('footer-links-admin-destroy');

    // Order Statuses
    Route::get('/admin/order-statuses', [App\Http\Controllers\Admin\OrderStatusesController::class, 'index'])->name('order-statuses-admin-index');
    Route::get('/admin/order-statuses/show/{id}', [App\Http\Controllers\Admin\OrderStatusesController::class, 'show'])->name('order-statuses-admin-show');
    Route::post('/admin/order-statuses/update/{id}', [App\Http\Controllers\Admin\OrderStatusesController::class, 'update'])->name('order-statuses-admin-update');
    Route::post('/admin/order-statuses/store', [App\Http\Controllers\Admin\OrderStatusesController::class, 'store'])->name('order-statuses-admin-store');
    Route::get('/admin/order-statuses/destroy/{id}', [App\Http\Controllers\Admin\OrderStatusesController::class, 'destroy'])->name('order-statuses-admin-destroy');

    // Small Slider
    Route::get('/admin/small-slider', [App\Http\Controllers\Admin\SmallSliderController::class, 'index'])->name('small-slider-admin-index');
    Route::get('/admin/small-slider/show/{id}', [App\Http\Controllers\Admin\SmallSliderController::class, 'show'])->name('small-slider-admin-show');
    Route::post('/admin/small-slider/update/{id}', [App\Http\Controllers\Admin\SmallSliderController::class, 'update'])->name('small-slider-admin-update');
    Route::post('/admin/small-slider/store', [App\Http\Controllers\Admin\SmallSliderController::class, 'store'])->name('small-slider-admin-store');
    Route::get('/admin/small-slider/destroy/{id}', [App\Http\Controllers\Admin\SmallSliderController::class, 'destroy'])->name('small-slider-admin-destroy');

    // Site Datas
    Route::get('/admin/site-data', [App\Http\Controllers\Admin\SiteDataController::class, 'index'])->name('site-data-admin-index');
    Route::get('/admin/site-data/show/{id}', [App\Http\Controllers\Admin\SiteDataController::class, 'show'])->name('site-data-admin-show');
    Route::post('/admin/site-data/update/{id}', [App\Http\Controllers\Admin\SiteDataController::class, 'update'])->name('site-data-admin-update');
    Route::post('/admin/site-data/store', [App\Http\Controllers\Admin\SiteDataController::class, 'store'])->name('site-data-admin-store');
    Route::get('/admin/site-data/destroy/{id}', [App\Http\Controllers\Admin\SiteDataController::class, 'destroy'])->name('site-data-admin-destroy');

    // Users
    Route::get('/admin/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('users-admin-index');
    Route::get('/admin/users/show/{id}', [App\Http\Controllers\Admin\UsersController::class, 'show'])->name('users-admin-show');
    Route::post('/admin/users/change-account-secondary-data-admin/{id}', [App\Http\Controllers\Admin\UsersController::class, 'change_account_secondary_data'])->name('change-account-secondary-data-admin');
    Route::post('/admin/users/change-account-secondary-data-docs-admin/{id}', [App\Http\Controllers\Admin\UsersController::class, 'change_account_secondary_data_docs'])->name('change-account-secondary-data-docs-admin');
    Route::get('/admin/users/city/{id}', [App\Http\Controllers\Admin\UsersController::class, 'city'])->name('users-admin-city');
    Route::get('/admin/users/order/{id}', [App\Http\Controllers\Admin\UsersController::class, 'order'])->name('users-admin-order');
    Route::post('/admin/users/update/{id}', [App\Http\Controllers\Admin\UsersController::class, 'update'])->name('users-admin-update');
    Route::post('/admin/users/update-password/{id}', [App\Http\Controllers\Admin\UsersController::class, 'update_password'])->name('users-admin-update-password');
    Route::post('/admin/users/store', [App\Http\Controllers\Admin\UsersController::class, 'store'])->name('users-admin-store');
    Route::get('/admin/users/destroy/{id}', [App\Http\Controllers\Admin\UsersController::class, 'destroy'])->name('users-admin-destroy');

    // Locations
    Route::get('/admin/locations', [App\Http\Controllers\Admin\LocationsController::class, 'index'])->name('locations-admin-index');
    Route::get('/admin/locations/show/{id}', [App\Http\Controllers\Admin\LocationsController::class, 'show'])->name('locations-admin-show');
    Route::post('/admin/locations/update/{id}', [App\Http\Controllers\Admin\LocationsController::class, 'update'])->name('locations-admin-update');
    Route::post('/admin/locations/store', [App\Http\Controllers\Admin\LocationsController::class, 'store'])->name('locations-admin-store');
    Route::get('/admin/locations/destroy/{id}', [App\Http\Controllers\Admin\LocationsController::class, 'destroy'])->name('locations-admin-destroy');

    // Currrencies
    Route::get('/admin/currencies', [App\Http\Controllers\Admin\CurrenciesController::class, 'index'])->name('currencies-admin-index');
    Route::get('/admin/currencies/show/{id}', [App\Http\Controllers\Admin\CurrenciesController::class, 'show'])->name('currencies-admin-show');
    Route::post('/admin/currencies/update/{id}', [App\Http\Controllers\Admin\CurrenciesController::class, 'update'])->name('currencies-admin-update');
    Route::post('/admin/currencies/store', [App\Http\Controllers\Admin\CurrenciesController::class, 'store'])->name('currencies-admin-store');
    Route::get('/admin/currencies/destroy/{id}', [App\Http\Controllers\Admin\CurrenciesController::class, 'destroy'])->name('currencies-admin-destroy');

    // Reviews
    Route::get('/admin/reviews', [App\Http\Controllers\Admin\ReviewsController::class, 'index'])->name('reviews-admin-index');
    Route::get('/admin/reviews/show/{id}', [App\Http\Controllers\Admin\ReviewsController::class, 'show'])->name('reviews-admin-show');
    Route::post('/admin/reviews/update/{id}', [App\Http\Controllers\Admin\ReviewsController::class, 'update'])->name('reviews-admin-update');
    Route::post('/admin/reviews/store', [App\Http\Controllers\Admin\ReviewsController::class, 'store'])->name('reviews-admin-store');
    Route::get('/admin/reviews/destroy/{id}', [App\Http\Controllers\Admin\ReviewsController::class, 'destroy'])->name('reviews-admin-destroy');

    // Backgrounds
    Route::get('/admin/backgrounds', [App\Http\Controllers\Admin\BackgroundsController::class, 'index'])->name('backgrounds-admin-index');
    Route::get('/admin/backgrounds/show/{id}', [App\Http\Controllers\Admin\BackgroundsController::class, 'show'])->name('backgrounds-admin-show');
    Route::post('/admin/backgrounds/update/{id}', [App\Http\Controllers\Admin\BackgroundsController::class, 'update'])->name('backgrounds-admin-update');
    Route::post('/admin/backgrounds/store', [App\Http\Controllers\Admin\BackgroundsController::class, 'store'])->name('backgrounds-admin-store');
    Route::get('/admin/backgrounds/destroy/{id}', [App\Http\Controllers\Admin\BackgroundsController::class, 'destroy'])->name('backgrounds-admin-destroy');

    // Cart
    Route::get('/admin/cart', [App\Http\Controllers\Admin\CartController::class, 'index'])->name('cart-admin-index');
    Route::get('/admin/cart/show/{id}', [App\Http\Controllers\Admin\CartController::class, 'show'])->name('cart-admin-show');
    Route::get('/admin/cart/order/{id}', [App\Http\Controllers\Admin\CartController::class, 'order'])->name('cart-admin-order');
    Route::post('/admin/cart/update/{id}', [App\Http\Controllers\Admin\CartController::class, 'update'])->name('cart-admin-update');
    Route::post('/admin/cart/store', [App\Http\Controllers\Admin\CartController::class, 'store'])->name('cart-admin-store');
    Route::get('/admin/cart/destroy/{id}', [App\Http\Controllers\Admin\CartController::class, 'destroy'])->name('cart-admin-destroy');

    // Products
    Route::get('/admin/products', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('products-admin-index');
    Route::get('/admin/products/create', [App\Http\Controllers\Admin\ProductsController::class, 'create'])->name('products-admin-create');
    Route::get('/admin/products/show/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'show'])->name('products-admin-show');
    Route::post('/admin/products/update/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'update'])->name('products-admin-update');
    Route::post('/admin/products/update-image/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'update_image'])->name('products-admin-update-image');
    Route::post('/admin/products/update-embed/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'update_embed'])->name('products-admin-update-embed');
    Route::post('/admin/products/update-option/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'update_option'])->name('products-admin-update-option');
    Route::post('/admin/products/update-category/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'update_category'])->name('products-admin-update-category');
    Route::post('/admin/products/store', [App\Http\Controllers\Admin\ProductsController::class, 'store'])->name('products-admin-store');
    Route::post('/admin/products/store-option', [App\Http\Controllers\Admin\ProductsController::class, 'store_option'])->name('products-admin-store-option');
    Route::post('/admin/products/store-category/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'store_category'])->name('products-admin-store-category');
    Route::get('/admin/products/destroy/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'destroy'])->name('products-admin-destroy');
    Route::get('/admin/products/destroy-image/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'destroy_image'])->name('products-admin-destroy-image');
    Route::get('/admin/products/destroy-embed/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'destroy_embed'])->name('products-admin-destroy-embed');
    Route::get('/admin/products/destroy-option/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'destroy_option'])->name('products-admin-destroy-option');
    Route::get('/admin/products/destroy-category/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'destroy_category'])->name('products-admin-destroy-category');

    // FAQ's
    Route::get('/admin/faqs', [App\Http\Controllers\Admin\FaqsController::class, 'index'])->name('faqs-admin-index');
    Route::get('/admin/faqs/show/{id}', [App\Http\Controllers\Admin\FaqsController::class, 'show'])->name('faqs-admin-show');
    Route::post('/admin/faqs/update/{id}', [App\Http\Controllers\Admin\FaqsController::class, 'update'])->name('faqs-admin-update');
    Route::post('/admin/faqs/store', [App\Http\Controllers\Admin\FaqsController::class, 'store'])->name('faqs-admin-store');
    Route::get('/admin/faqs/destroy/{id}', [App\Http\Controllers\Admin\FaqsController::class, 'destroy'])->name('faqs-admin-destroy');

    // Profile
    Route::get('/admin/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile-admin-index');
    Route::get('/admin/profile/show/{id}', [App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('profile-admin-show');
    Route::post('/admin/profile/update', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile-admin-update');
    Route::post('/admin/profile/update-img', [App\Http\Controllers\Admin\ProfileController::class, 'update_img'])->name('profile-admin-update-img');
    Route::post('/admin/profile/store', [App\Http\Controllers\Admin\ProfileController::class, 'store'])->name('profile-admin-store');
    Route::get('/admin/profile/destroy', [App\Http\Controllers\Admin\ProfileController::class, 'destroy'])->name('profile-admin-destroy');

    // Need Help ?
    Route::get('/admin/need-help', [App\Http\Controllers\Admin\NeedHelpController::class, 'index'])->name('need-help-admin-index');
    Route::get('/admin/need-help/show/{id}', [App\Http\Controllers\Admin\NeedHelpController::class, 'show'])->name('need-help-admin-show');
    Route::post('/admin/need-help/update/{id}', [App\Http\Controllers\Admin\NeedHelpController::class, 'update'])->name('need-help-admin-update');
    Route::get('/admin/need-help/destroy/{id}', [App\Http\Controllers\Admin\NeedHelpController::class, 'delete'])->name('need-help-admin-destroy');

    // Support
    Route::post('/admin/support-send', [App\Http\Controllers\Admin\SendController::class, 'support'])->name('support-message-send-admin');

});

// Route::fallback(function () {
//     return redirect()->route('error', ['locale' => app()->getLocale()]);
// });




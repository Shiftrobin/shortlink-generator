<?php

use Illuminate\Support\Facades\Route;

//Auth
use App\Http\Controllers\Auth\LoginController;

//Custom Backend controllers
use App\Http\Controllers\Backend\MenuPermissionController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;

use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\ContactController;

use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AutologinController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\ServiceController;

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\BrandController;

use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\OrderController;

use App\Http\Controllers\Backend\MemberController;
use App\Http\Controllers\Backend\QrcodeController;
use App\Http\Controllers\Backend\ShortlinkController;


//Custom Frontend controllers
use App\Http\Controllers\Frontend\FrontenController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\SslCommerzPaymentController;

use App\Http\Controllers\Frontend\VcardController;
use App\Http\Controllers\Backend\PasswordResetController;
use Illuminate\Support\Facades\Auth;


//Routes

//cache clear
Route::get('/cc', function () {
    try {
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('cache:clear');
        //Artisan::call('config:cache');
        //Artisan::call('route:cache');
        //Artisan::call('view:cache');
        return "Cache Cleared!";
    } catch (\Exception $e) {
        dd($e);
    }
});


Route::get('/', [FrontenController::class, 'default'])->name('default');
Route::get('/s', [FrontenController::class, 'sub'])->name('sub');
Route::get('/s/{code}',[ShortlinkController::class, 'ShortenLink'])->name('shorten.link');

//Route::get('/qrcode-download/{id}', [FrontenController::class, 'QrcodeDownload'])->name('qrcode.download');

// Route::get('/', [VcardController::class, 'memberSearch'])->name('member.search');
//Route::get('/member-search-result', [VcardController::class, 'memberSearchResult'])->name('member.search.result');
//Route::get('/member/{name}/{id}', [VcardController::class, 'memberProfile'])->name('member.profile');
//Route::get('/vcfdownload/{id}', [VcardController::class, 'vcfDownload'])->name('vcf.download');
//Route::get('/qrdownload/{id}', [VcardController::class, 'qrDownload'])->name('qr.download');

Route::get('about-us', [FrontenController::class, 'aboutUs'])->name('about.us');
Route::get('batch', [FrontenController::class, 'Batch'])->name('batch');

// Route::get('batch-view/{batch}',[FrontenController::class, 'BatchView'])->name('batch.view');

Route::get('help-faq', [FrontenController::class, 'helpFaq'])->name('frontend.help-faq');
Route::get('privacy-policy', [FrontenController::class, 'privacyPolicy'])->name('frontend.privacy-policy');

Route::get('terms-condition', [FrontenController::class, 'termsCondition'])->name('frontend.terms-condition');
Route::get('contact-us', [FrontenController::class, 'contactUs'])->name('contact.us');
Route::post('/contact/store', [FrontenController::class, 'store'])->name('contatct.store');
Route::get('service', [FrontenController::class, 'sevice'])->name('frontend.service');

Route::get('/shopping-cart', [FrontenController::class, 'shoppingCart'])->name('shopping.cart');
Route::get('/product-category/{category_id}', [FrontenController::class, 'categoryWiseProduct'])->name('category.wise.product');
Route::get('/sub-category/{sub_category_id}', [FrontenController::class, 'subCategoryWiseProduct'])->name('sub.category.wise.product');
Route::get('/all-sub-category', [FrontenController::class, 'allSubCategory'])->name('all.sub-category.list');

Route::get('/all-new-arrival', [FrontenController::class, 'allNewArrival'])->name('all.new-arrival.list');
Route::get('/all-best-seller', [FrontenController::class, 'allBestSeller'])->name('all.best-seller.list');
Route::get('/all-popular', [FrontenController::class, 'allPopular'])->name('all.popular.list');
Route::get('/all-sales', [FrontenController::class, 'allSales'])->name('all.sales.list');

Route::get('/product-details/{slug}', [FrontenController::class, 'productDetails'])->name('products.details.info');
Route::get('/home-find-product', [FrontenController::class, 'findHomeProduct'])->name('home.find.product');
Route::get('/other-find-product', [FrontenController::class, 'findOtherProduct'])->name('other.find.product');

Route::post('/get-product', [FrontenController::class, 'findProduct'])->name('find.product');
Route::get('/serach-product', [FrontenController::class, 'searchProduct'])->name('search.product');
Route::post('/subscribe', [FrontenController::class, 'subscribeStore'])->name('subscribe.store');

//Shopping-Cart
Route::post('/add-to-cart', [CartController::class, 'addtoCart'])->name('insert.cart');
Route::post('/add-to-cart-details', [CartController::class, 'addtoCartDetails'])->name('insert.cart.details');
Route::get('/show-cart', [CartController::class, 'showCart'])->name('show.cart');

Route::post('/update-cart', [CartController::class, 'updateCart'])->name('update.cart');
Route::post('/payment-update-cart', [CartController::class, 'paymentUpdateCart'])->name('payment.update.cart');
Route::get('/delete-cart/{rowId}', [CartController::class, 'deleteCart'])->name('delete.cart');

//customer
Route::get('/registration-success', [CheckoutController::class, 'registrationSuccess'])->name('registration.success');
Route::get('/customer-login', [CheckoutController::class, 'customerLogin'])->name('customer.login');
Route::get('/customer-signup', [CheckoutController::class, 'customerSignup'])->name('customer.signup');
// Route::get('/registration', [CheckoutController::class, 'customerSignup'])->name('customer.signup');
Route::post('/signup-store', [CheckoutController::class, 'signupStore'])->name('signup.store');
Route::get('/email-verify', [CheckoutController::class, 'emailVerify'])->name('email.verify');

Route::post('/verify-store', [CheckoutController::class, 'verifyStore'])->name('verify.store');
Route::get('/buy-order-cancel', [CheckoutController::class, 'buyOrderCancel'])->name('buy.order.cancel');
Route::get('customer-mobile-check', [CheckoutController::class, 'customerMobileCheck'])->name('customer.reg.mobile.check');
Route::get('customer-email-check', [CheckoutController::class, 'customerEmailCheck'])->name('customer.reg.email.check');
Route::get('customer-username-check', [CheckoutController::class, 'customerUsernameCheck'])->name('customer.reg.username.check');

//captcha
Route::get('reload-captcha', [CheckoutController::class, 'reloadCaptcha'])->name('reload.captcha');


//vcard
Route::get('/member-username-check', [VcardController::class, 'memberUsernameCheck'])->name('member.reg.username.check');
Route::get('/member-email-check', [VcardController::class, 'memberEmailCheck'])->name('member.reg.email.check');
Route::get('/signup', [VcardController::class, 'index'])->name('signup');
Route::post('/member-store', [VcardController::class, 'store'])->name('member.store');
Route::get('/member-login', [VcardController::class, 'login'])->name('member.login');


//Reset Password
Route::get('reset/password', [PasswordResetController::class, 'resetPassword'])->name('reset.password');
Route::post('check/email', [PasswordResetController::class, 'checkEmail'])->name('check.email');
Route::get('check/name', [PasswordResetController::class, 'checkName'])->name('check.name');
Route::get('check/code', [PasswordResetController::class, 'checkCode'])->name('check.code');

Route::post('submit/check/code', [PasswordResetController::class, 'submitCode'])->name('submit.check.code');
Route::get('new/password', [PasswordResetController::class, 'newPassword'])->name('new.password');
Route::post('store/new/password', [PasswordResetController::class, 'newPasswordStore'])->name('store.new.password');

//admin division district upazila union
Route::get('/get-division', [DefaultController::class, 'getDivision'])->name('default.get-division');
Route::get('/get-region-district', [DefaultController::class, 'getgetDistricByRegion'])->name('default.get-region-district');
Route::get('/get-district', [DefaultController::class, 'getDistrict'])->name('default.get-district');
Route::get('/get-upazila', [DefaultController::class, 'getUpazila'])->name('default.get-upazila');
Route::get('/get-district-master', [DefaultController::class, 'getDistrictMaster'])->name('default.get-district-master');
Route::get('/get-upazila-master', [DefaultController::class, 'getUpazilaMaster'])->name('default.get-upazila-master');

Route::get('/get-union', [DefaultController::class, 'getUnion'])->name('default.get-union');
Route::get('/get-violence-sub-category', [DefaultController::class, 'getViolenceSubCategory'])->name('default.get-violence-sub-category');
Route::get('/get-violence-name', [DefaultController::class, 'getViolenceName'])->name('default.get-violence-name');
Route::get('/get-organization-name', [DefaultController::class, 'getOrganizationName'])->name('default.get-organization-name');
Route::get('/get-support-name', [DefaultController::class, 'getSupportName'])->name('default.get-support-name');


// SSLCOMMERZ Start
// Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
// Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);
Route::post('/pay', [SslCommerzPaymentController::class, 'index']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END



//authentication
//Auth::routes();
// Disable the default login routes
Auth::routes(['login' => false]);

// Define custom login routes
Route::get('custom-middleware-secure-gate', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('custom-middleware-secure-gate', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//old code
// Route::get('custom-middleware-secure-gate', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('custom-middleware-secure-gate', [LoginController::class, 'login']);
// Route::post('logout', [LoginController::class, 'logout'])->name('logout');


//customer-dashboard
Route::group(['middleware' => ['auth', 'customer']], function () {
    Route::get('/get-collection-type', [CheckoutController::class, 'getCollectionTime'])->name('get-collection-time-as-per.shopping_type');
    Route::get('/shopping_type', [CheckoutController::class, 'shoppingType'])->name('customer.shopping_type');
    Route::post('/shopping_type/store', [CheckoutController::class, 'shoppingTypeStore'])->name('customer.shopping_type.store');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/review/store', [DashboardController::class, 'reviewStore'])->name('review.store');

    //vcard members
    Route::prefix('members')->group(function () {
        Route::get('/customer-edit-profile', [DashboardController::class, 'editProfile'])->name('customer.edit.profile');
        Route::post('/customer-update-profile', [DashboardController::class, 'updateProfile'])->name('customer.update.profile');

        Route::get('/customer-passowrd-change', [DashboardController::class, 'passwordChange'])->name('customer.passowrd.change');
        Route::post('/customer-passowrd-update', [DashboardController::class, 'passwordUpdate'])->name('customer.passowrd.update');
    });

    Route::get('/customer-card/{id}', [DashboardController::class, 'customerCard'])->name('customer.card');

    Route::get('/payment', [DashboardController::class, 'payment'])->name('customer.payment');
    Route::post('/payment/store', [DashboardController::class, 'paymentStore'])->name('customer.payment.store');
    Route::get('/order-list', [DashboardController::class, 'orderList'])->name('customer.order.list');
    Route::get('/product-delivery', [DashboardController::class, 'productDelivery'])->name('customer.product.delivery');
    Route::get('/order-details/{order_no}', [DashboardController::class, 'orderDetails'])->name('customer.order.details');

    Route::get('/order-refund/{order_no}', [DashboardController::class, 'orderRefund'])->name('customer.order.refund');
    Route::post('/store-refund/{id}', [DashboardController::class, 'orderRefundStore'])->name('customer.order.refund.store');
    Route::get('/order-print/{order_no}', [DashboardController::class, 'orderPrint'])->name('customer.order.print');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    //admin-dashboard
    Route::get('/get-sub-cat', [DefaultController::class, 'getSubcat'])->name('get-sub-category');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::prefix('users')->group(function () {
        Route::get('/view', [UserController::class, 'view'])->name('users.view');
        Route::get('/add', [UserController::class, 'add'])->name('users.add');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::post('/delete', [UserController::class, 'delete'])->name('users.delete');
        //Role
        Route::get('/role/view', [RoleController::class, 'view'])->name('users.role.view');
        Route::get('/role/add', [RoleController::class, 'add'])->name('users.role.add');
        Route::post('/role/store', [RoleController::class, 'store'])->name('users.role.store');
        Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('users.role.edit');
        Route::post('/role/update/{id}', [RoleController::class, 'update'])->name('users.role.update');
        Route::post('/role/delete', [RoleController::class, 'delete'])->name('users.role.delete');
        //Menu permission
        Route::get('/menu-permission', [MenuPermissionController::class, 'index'])->name('users.menu_permission');
        Route::get('/menu-permission-list', [MenuPermissionController::class, 'menuPermissionList'])->name('users.menu_permission.list');
        Route::post('/menu-permission-store', [MenuPermissionController::class, 'menuPermissionStore'])->name('users.menu_permission.store');
    });

    Route::prefix('profiles')->group(function () {
        Route::get('/view', [ProfileController::class, 'view'])->name('profiles.view');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
        Route::post('/store', [ProfileController::class, 'update'])->name('profiles.update');
        Route::get('/passowrd/view', [ProfileController::class, 'passwordView'])->name('profiles.passowrd.view');
        Route::post('/passowrd/update', [ProfileController::class, 'passwordUpdate'])->name('profiles.passowrd.update');
    });

    Route::prefix('site-setting')->group(function () {
        //Logo
        Route::get('/logo/view', [LogoController::class, 'view'])->name('site-setting.logo.view');
        Route::get('/logo/add', [LogoController::class, 'add'])->name('site-setting.logo.add');
        Route::post('/logo/store', [LogoController::class, 'store'])->name('site-setting.logo.store');
        Route::get('/logo/edit/{id}', [LogoController::class, 'edit'])->name('site-setting.logo.edit');
        Route::post('/logo/update/{id}', [LogoController::class, 'update'])->name('site-setting.logo.update');
        Route::post('/logo/delete', [LogoController::class, 'delete'])->name('site-setting.logo.delete');
        //Contact Us
        Route::get('/contact/view', [ContactController::class, 'view'])->name('site-setting.contact.view');
        Route::get('/contact/add', [ContactController::class, 'add'])->name('site-setting.contact.add');
        Route::post('/contact/store', [ContactController::class, 'store'])->name('site-setting.contact.store');
        Route::get('/contact/edit/{id}', [ContactController::class, 'edit'])->name('site-setting.contact.edit');
        Route::post('/contact/update/{id}', [ContactController::class, 'update'])->name('site-setting.contact.update');
        Route::post('/contact/delete', [ContactController::class, 'delete'])->name('site-setting.contact.delete');
        Route::get('/communicate', [ContactController::class, 'viewCommunicate'])->name('site-setting.communicate.view');
        Route::post('/communicate/delete', [ContactController::class, 'deleteCommunicate'])->name('site-setting.communicate.delete');
        //Slider
        Route::get('/slider/view', [SliderController::class, 'view'])->name('site-setting.slider.view');
        Route::get('/slider/add', [SliderController::class, 'add'])->name('site-setting.slider.add');
        Route::post('/slider/store', [SliderController::class, 'store'])->name('site-setting.slider.store');
        Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('site-setting.slider.edit');
        Route::post('/slider/update/{id}', [SliderController::class, 'update'])->name('site-setting.slider.update');
        Route::post('/slider/delete', [SliderController::class, 'delete'])->name('site-setting.slider.delete');
        //About us
        Route::get('/about/view', [AboutController::class, 'view'])->name('site-setting.about.view');
        Route::get('/about/add', [AboutController::class, 'àdd'])->name('site-setting.about.add');
        Route::post('/about/store', [AboutController::class, 'store'])->name('site-setting.about.store');
        Route::get('/about/edit/{id}', [AboutController::class, 'edit'])->name('site-setting.about.edit');
        Route::post('/about/update/{id}', [AboutController::class, 'update'])->name('site-setting.about.update');
        Route::post('/about/delete', [AboutController::class, 'delete'])->name('site-setting.about.delete');

        //FAQ Caregory
        Route::get('/faq/category/view', [SiteSettingController::class, 'faqCategoryView'])->name('site-setting.faq.category.view');
        Route::get('/faq/category/add', [SiteSettingController::class, 'faqCategoryAdd'])->name('site-setting.faq.category.add');
        Route::post('/faq/category/store', [SiteSettingController::class, 'faqCategoryStore'])->name('site-setting.faq.category.store');
        Route::get('/faq/category/edit/{id}', [SiteSettingController::class, 'faqCategoryEdit'])->name('site-setting.faq.category.edit');
        Route::post('/faq/category/update/{id}', [SiteSettingController::class, 'faqCategoryUpdate'])->name('site-setting.faq.category.update');
        Route::post('/faq/category/delete', [SiteSettingController::class, 'faqCategoryDelete'])->name('site-setting.faq.category.delete');
        //FAQ
        Route::get('/faq/view', [SiteSettingController::class, 'faqView'])->name('site-setting.faq.view');
        Route::get('/faq/add', [SiteSettingController::class, 'faqAdd'])->name('site-setting.faq.add');
        Route::post('/faq/store', [SiteSettingController::class, 'faqStore'])->name('site-setting.faq.store');
        Route::get('/faq/edit/{id}', [SiteSettingController::class, 'faqEdit'])->name('site-setting.faq.edit');
        Route::post('/faq/update/{id}', [SiteSettingController::class, 'faqUpdate'])->name('site-setting.faq.update');
        Route::post('/faq/delete', [SiteSettingController::class, 'faqDelete'])->name('site-setting.faq.delete');
        //Privacy Policy
        Route::get('/privacy-policy/view', [SiteSettingController::class, 'policyView'])->name('site-setting.privacy-policy.view');
        Route::get('/privacy-policy/add', [SiteSettingController::class, 'policyAdd'])->name('site-setting.privacy-policy.add');
        Route::post('/privacy-policy/store', [SiteSettingController::class, 'policyStore'])->name('site-setting.privacy-policy.store');
        Route::get('/privacy-policy/edit/{id}', [SiteSettingController::class, 'policyEdit'])->name('site-setting.privacy-policy.edit');
        Route::post('/privacy-policy/update/{id}', [SiteSettingController::class, 'policyUpdate'])->name('site-setting.privacy-policy.update');
        Route::post('/privacy-policy/delete', [SiteSettingController::class, 'policyDelete'])->name('site-setting.privacy-policy.delete');
        //Terms & Condition
        Route::get('/terms-condition/view', [SiteSettingController::class, 'termsView'])->name('site-setting.terms-condition.view');
        Route::get('/terms-condition/add', [SiteSettingController::class, 'termsAdd'])->name('site-setting.terms-condition.add');
        Route::post('/terms-condition/store', [SiteSettingController::class, 'termsStore'])->name('site-setting.terms-condition.store');
        Route::get('/terms-condition/edit/{id}', [SiteSettingController::class, 'termsEdit'])->name('site-setting.terms-condition.edit');
        Route::post('/terms-condition/update/{id}', [SiteSettingController::class, 'termsUpdate'])->name('site-setting.terms-condition.update');
        Route::post('/terms-condition/delete', [SiteSettingController::class, 'termsDelete'])->name('site-setting.terms-condition.delete');
        //Promotion
        Route::get('/promotion/view', [SiteSettingController::class, 'promotionView'])->name('site-setting.promotion.view');
        Route::get('/promotion/add', [SiteSettingController::class, 'promotionAdd'])->name('site-setting.promotion.add');
        Route::post('/promotion/store', [SiteSettingController::class, 'promotionStore'])->name('site-setting.promotion.store');
        Route::get('/promotion/edit/{id}', [SiteSettingController::class, 'promotionEdit'])->name('site-setting.promotion.edit');
        Route::post('/promotion/update/{id}', [SiteSettingController::class, 'promotionUpdate'])->name('site-setting.promotion.update');
        Route::post('/promotion/delete', [SiteSettingController::class, 'promotionDelete'])->name('site-setting.promotion.delete');
        //Offer
        Route::get('/offer/view', [SiteSettingController::class, 'offerView'])->name('site-setting.offer.view');
        Route::get('/offer/add', [SiteSettingController::class, 'offerAdd'])->name('site-setting.offer.add');
        Route::post('/offer/store', [SiteSettingController::class, 'offerStore'])->name('site-setting.offer.store');
        Route::get('/offer/edit/{id}', [SiteSettingController::class, 'offerEdit'])->name('site-setting.offer.edit');
        Route::post('/offer/update/{id}', [SiteSettingController::class, 'offerUpdate'])->name('site-setting.offer.update');
        Route::post('/offer/delete', [SiteSettingController::class, 'offerDelete'])->name('site-setting.offer.delete');
    });

    Route::prefix('banners')->group(function () {
        Route::get('/view', [SiteSettingController::class, 'bannerView'])->name('banners.banner.view');
        Route::get('/add', [SiteSettingController::class, 'bannerAdd'])->name('banners.banner.add');
        Route::post('/store', [SiteSettingController::class, 'bannerStore'])->name('banners.banner.store');
        Route::get('/edit/{id}', [SiteSettingController::class, 'bannerEdit'])->name('banners.banner.edit');
        Route::post('/update/{id}', [SiteSettingController::class, 'bannerUpdate'])->name('banners.banner.update');
        Route::post('/delete', [SiteSettingController::class, 'bannerDelete'])->name('banners.banner.delete');
    });

    Route::prefix('services')->group(function () {
        Route::get('/view', [ServiceController::class, 'view'])->name('services.view');
        Route::get('/add', [ServiceController::class, 'add'])->name('services.add');
        Route::post('/store', [ServiceController::class, 'store'])->name('services.store');
        Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('services.edit');
        Route::post('/update/{id}', [ServiceController::class, 'update'])->name('services.update');
        Route::post('/delete', [ServiceController::class, 'delete'])->name('services.delete');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/view', [CategoryController::class, 'view'])->name('categories.view');
        Route::get('/add', [CategoryController::class, 'add'])->name('categories.add');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::post('/delete', [CategoryController::class, 'delete'])->name('categories.delete');
        //Sub-Category
        Route::get('/sub-category-view', [CategoryController::class, 'subCategoryView'])->name('categories.sub.category.view');
        Route::get('/sub-category-add', [CategoryController::class, 'subCategoryAdd'])->name('categories.sub.category.add');
        Route::post('/sub-category-store', [CategoryController::class, 'subCategoryStore'])->name('categories.sub.category.store');
        Route::get('/sub-category-edit/{id}', [CategoryController::class, 'subCategoryEdit'])->name('categories.sub.category.edit');
        Route::post('/sub-category-update/{id}', [CategoryController::class, 'subCategoryUpdate'])->name('categories.sub.category.update');
        Route::post('/sub-category-delete', [CategoryController::class, 'subCategoryDelete'])->name('categories.sub.category.delete');
    });

    Route::prefix('communicates')->group(function () {
        Route::get('/view', [TestimonialController::class, 'viewContactor'])->name('communicates.contactor.view');
        Route::get('/details/{id}', [TestimonialController::class, 'detailsContactor'])->name('communicates.contactor.details');
        Route::post('/delete', [TestimonialController::class, 'deleteContactor'])->name('communicates.contactor.delete');
        //Subscriber
        Route::get('/subscriber/view', [TestimonialController::class, 'viewSubscriber'])->name('communicates.subscriber.view');
        Route::post('/subscriber/delete', [TestimonialController::class, 'deleteSubscriber'])->name('communicates.subscriber.delete');
        //Reviews
        Route::get('/review/view', [TestimonialController::class, 'viewReview'])->name('communicates.review.view');
        Route::post('/review/delete', [TestimonialController::class, 'deleteReview'])->name('communicates.review.delete');
        Route::get('/inactive/{id}', [TestimonialController::class, 'inactiveReview'])->name('communicates.inactive');
        Route::get('/active/{id}', [TestimonialController::class, 'activeReview'])->name('communicates.active');
    });

    Route::prefix('setups')->group(function () {
        // Unit
        Route::get('/unit/view', [UnitController::class, 'view'])->name('setups.units.view');
        Route::get('/unit/add', [UnitController::class, 'add'])->name('setups.units.add');
        Route::post('/unit/store', [UnitController::class, 'store'])->name('setups.units.store');
        Route::get('/unit/edit/{id}', [UnitController::class, 'edit'])->name('setups.units.edit');
        Route::post('/unit/update/{id}', [UnitController::class, 'update'])->name('setups.units.update');
        Route::post('/unit/delete', [UnitController::class, 'delete'])->name('setups.units.delete');
        // Brand
        Route::get('/brand/view', [BrandController::class, 'view'])->name('setups.brands.view');
        Route::get('/brand/add', [BrandController::class, 'add'])->name('setups.brands.add');
        Route::post('/brand/store', [BrandController::class, 'store'])->name('setups.brands.store');
        Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('setups.brands.edit');
        Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('setups.brands.update');
        Route::post('/brand/delete', [BrandController::class, 'delete'])->name('setups.brands.delete');
        // Size
        Route::get('/size/view', [SizeController::class, 'view'])->name('setups.sizes.view');
        Route::get('/size/add', [SizeController::class, 'add'])->name('setups.sizes.add');
        Route::post('/size/store', [SizeController::class, 'store'])->name('setups.sizes.store');
        Route::get('/size/edit/{id}', [SizeController::class, 'edit'])->name('setups.sizes.edit');
        Route::post('/size/update/{id}', [SizeController::class, 'update'])->name('setups.sizes.update');
        Route::post('/size/delete', [SizeController::class, 'delete'])->name('setups.sizes.delete');
    });

    Route::prefix('products')->group(function () {
        Route::get('/view', [ProductController::class, 'view'])->name('products.view');
        Route::get('/add', [ProductController::class, 'add'])->name('products.add');
        Route::post('/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::post('/delete', [ProductController::class, 'delete'])->name('products.delete');
        Route::get('/details/{id}', [ProductController::class, 'details'])->name('products.details');
        Route::post('/delete/img', [ProductController::class, 'deleteImg'])->name('products.delete.img');
    });

    Route::prefix('vendors')->group(function () {
        Route::get('/view', [CustomerController::class, 'vendorView'])->name('vendors.view');
        Route::get('/edit', [CustomerController::class, 'vendorEdit'])->name('vendors.edit');
        Route::post('/upate', [CustomerController::class, 'vendorUpdate'])->name('vendors.update');
        Route::get('/approve/{id}', [CustomerController::class, 'vendorApprove'])->name('vendors.approve');
        Route::post('/approve-store/{id}', [CustomerController::class, 'vendorApproveStore'])->name('vendors.approve.store');
    });

    //customers
    Route::prefix('customers')->group(function () {
        Route::get('/view', [CustomerController::class, 'view'])->name('customers.view');
        Route::get('/editor-view', [CustomerController::class, 'EditorView'])->name('customers.editor.view');
        Route::get('/viewer-view', [CustomerController::class, 'viewerView'])->name('customers.viewer.view');
        Route::get('/draft/view', [CustomerController::class, 'drafView'])->name('customers.draft.view');
        Route::post('/delete', [CustomerController::class, 'delete'])->name('customers.delete');

        Route::get('/inactive/{id}', [CustomerController::class, 'inactive'])->name('customers.inactive');
        Route::get('/active/{id}', [CustomerController::class, 'active'])->name('customers.active');
        Route::get('/details-view/{id}', [CustomerController::class, 'detailsView'])->name('customers.details.view');
        Route::get('/member-card/{id}', [CustomerController::class, 'memberCard'])->name('member.card');
    });

    //members vcard
    Route::prefix('members')->group(function () {
        Route::get('/view', [MemberController::class, 'view'])->name('members.view');
        Route::post('/delete', [MemberController::class, 'delete'])->name('members.delete');
        Route::get('/inactive/{id}', [MemberController::class, 'inactive'])->name('members.inactive');
        Route::get('/active/{id}', [MemberController::class, 'active'])->name('members.active');
    });

    Route::prefix('orders')->group(function () {
        Route::get('/pending/list', [OrderController::class, 'pendingList'])->name('orders.pending.list');
        Route::get('/approved/list', [OrderController::class, 'approvedList'])->name('orders.approved.list');
        Route::get('/refund/list', [OrderController::class, 'refundList'])->name('orders.refund.list');
        Route::get('/details/{order_no}', [OrderController::class, 'details'])->name('orders.details');
        Route::get('/refund/{order_no}', [OrderController::class, 'refund'])->name('orders.refund');
        Route::post('/refund/store/{id}', [OrderController::class, 'refundStore'])->name('orders.refund.store');
        Route::post('/approve', [OrderController::class, 'approve'])->name('orders.approve');
    });

     //Autologin
    Route::prefix('autologins')->group(function () {
        Route::get('/view', [AutologinController::class, 'view'])->name('autologins.view');
        Route::get('/admin/view', [AutologinController::class, 'AdminView'])->name('autologins.admin.view');
        Route::get('/add', [AutologinController::class, 'add'])->name('autologins.add');
        Route::post('/store', [AutologinController::class, 'store'])->name('autologins.store');
        Route::get('/edit/{id}', [AutologinController::class, 'edit'])->name('autologins.edit');
        Route::post('/update/{id}', [AutologinController::class, 'update'])->name('autologins.update');
        Route::post('/delete', [AutologinController::class, 'delete'])->name('autologins.delete');
        Route::get('/inactive/{id}', [AutologinController::class, 'inactive'])->name('autologins.inactive');
        Route::get('/active/{id}', [AutologinController::class, 'active'])->name('autologins.active');
    });

    //QR Code
    Route::prefix('qrcodes')->group(function () {
        Route::get('/view', [QrcodeController::class, 'view'])->name('qrcodes.view');
        Route::get('/add', [QrcodeController::class, 'add'])->name('qrcodes.add');
        Route::post('/store', [QrcodeController::class, 'store'])->name('qrcodes.store');
        Route::get('/edit/{id}', [QrcodeController::class, 'edit'])->name('qrcodes.edit');
        Route::post('/update/{id}', [QrcodeController::class, 'update'])->name('qrcodes.update');
        Route::post('/delete', [QrcodeController::class, 'delete'])->name('qrcodes.delete');
        Route::get('/inactive/{id}', [QrcodeController::class, 'inactive'])->name('qrcodes.inactive');
        Route::get('/active/{id}', [QrcodeController::class, 'active'])->name('qrcodes.active');
        Route::get('/download/{id}', [QrcodeController::class, 'QrcodeDownload'])->name('qrcodes.download');

    });

      //Shortlink Code
      Route::prefix('shortlinks')->group(function () {
        Route::get('/view', [ShortlinkController::class, 'view'])->name('shortlinks.view');
        Route::get('/add', [ShortlinkController::class, 'add'])->name('shortlinks.add');
        Route::post('/store', [ShortlinkController::class, 'store'])->name('shortlinks.store');
        Route::get('/edit/{id}', [ShortlinkController::class, 'edit'])->name('shortlinks.edit');
        Route::post('/update/{id}', [ShortlinkController::class, 'update'])->name('shortlinks.update');
        Route::post('/delete', [ShortlinkController::class, 'delete'])->name('shortlinks.delete');
        Route::get('/inactive/{id}', [ShortlinkController::class, 'inactive'])->name('shortlinks.inactive');
        Route::get('/active/{id}', [ShortlinkController::class, 'active'])->name('shortlinks.active');
    });


});

Route::get('get-product-type', function () {
    dd(config('global.product_type'));
});

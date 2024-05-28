<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PiepzController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ImportProductController;
use App\Http\Controllers\Authentication\ForgotPasswordController;
use App\Http\Controllers\Authentication\AuthPartnerController;
use App\Http\Controllers\Authentication\AuthVendorController;
use App\Http\Controllers\Partner\PartnerAddOnsController;
use App\Http\Controllers\Partner\PartnerController;
use App\Http\Controllers\Partner\ProductPanelController;
use App\Http\Controllers\Vendor\VendorImportProductController;
use App\Http\Controllers\Vendor\VendorProductController;
use App\Http\Controllers\Vendor\VendorSupportController;
use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserManagement;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ChatController;


$AppHttpControllersPath = 'App\Http\Controllers';
route::get('one', [ChatController::class, "one"])->name('one');
route::get('one1', [ChatController::class, "one1"])->name('one1');
route::get('chat/{id?}', [ChatController::class, "index"])->name('chat');

# <=== AUTHENTICATION - Start ===>

// Google Authentication
Route::get('auth/google', [UserManagement::class, 'googleLogin'])->name('auth.google');
Route::get('auth/google/callback', [UserManagement::class, 'handleGoogleCallback'])->name('auth.google.callback');

// Basic Authentication
Route::post('/login', [UserManagement::class, 'loginPost'])->name('auth-login-post');
Route::get('/login', [UserManagement::class, 'LoginBasic'])->name('auth-login-basic');
Route::get('/', [UserManagement::class, 'LoginBasic'])->name('-login-basic');
Route::get('/logout', [UserManagement::class, 'logout'])->name('logout');
Route::get('admin/user/approve/{id}', [UserManagement::class, 'userApprove'])->name('admin.user.approve');

// Forgot & Reset Password
Route::get('/auth/forgot-password-basic', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('auth-reset-password-basic');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//Partner Registration
Route::controller(AuthPartnerController::class)->prefix('auth')->group(function () {
  Route::get('/partner-confirmation', 'partnerConfirmation')->name('partner.confirmation');
  Route::get('/partner', 'partner')->name('partner');
  Route::post('ajaxRequest', 'ajaxRequestPost')->name('ajaxRequest.post');
  Route::post('ajaxRequest1', 'ajaxRequestPost1')->name('ajaxRequest.post1');
});


# <=== AUTHENTICATION - Start ===>


# <=== INTEGRATIONS - Start ===>
// Stripe
Route::get('auth/payment', [PaymentController::class, 'payment'])->name('payment');
Route::post('auth/payment1', [PaymentController::class, 'payment1'])->name('payment1');

Route::get('success', [PaymentController::class, 'success'])->name('success');
Route::get('cancel', [PaymentController::class, 'cancel'])->name('cancel');

Route::post('uploadFile', [GeneralController::class, 'uploadFile'])->name('uploadFile');

Route::post('general/import', [GeneralController::class, 'import'])->name('general.import');

# <=== INTEGRATIONS - Start ===>


# <=== ADMIN USER - Start ===>

// Admin Middleware End
Route::middleware(['admin'])->group(function () {

  Route::controller(AdminController::class)->prefix('admin')->group(function () {

    // Dashboard
    Route::get('dashboard', 'index')->name('admin.dashboard');

    // Analytics
    Route::get('analytics', 'analytics')->name('admin.analytics');

    // Admin Profile
    Route::get('profile', 'myProfile')->name('profile.setting');
    Route::post('profile', 'updateProfile')->name('admin.update.profile');
    Route::post('image-upload', 'profileImage')->name('image.store');
    Route::post('change-password', 'changePassword')->name('admin.change.password');

    //Users
    Route::get('users', 'users')->name('admin.users');
    Route::get('users/{iRoleId}', 'users')->name('admin.users.with.params');
    Route::get('users/vendors', 'usersVendors')->name('admin.users.vendors');
    Route::get('users/partners', 'usersPartners')->name('admin.users.partners');

    Route::get('users/profile/{id}', 'userProfile')->name('admin.users.profile');
    Route::get('users/profile-billing/{id}', 'userProfileVB')->name('admin.users.profileVB');
    Route::get('users/profile-connection/{id}', 'userProfileVC')->name('admin.users.profileVC');
    Route::get('users/profile-notification/{id}', 'userProfileVN')->name('admin.users.profileVN');
    Route::get('users/profile-security/{id}', 'userProfileVS')->name('admin.users.profileVS');
    Route::get('users/bulk-edit/{sIds}', 'usersBulkEdit')->name('admin.users.bulkedit');
    Route::post('users-bulk-edit-operations', 'usersBulkEditOperations')->name('admin.users.bulkedit.operations');

    Route::post('user-operations', 'userOperations')->name('admin.user.operations');
    Route::get('get-users', 'getUsers')->name('admin.get.users');

    // Admin Profile
    Route::get('profile', [AdminController::class, 'myProfile'])->name('admin.profile.setting');
    Route::post('profile', [AdminController::class, 'updateProfile'])->name('admin.update.profile');
    Route::post('image-upload', [AdminController::class, 'profileImage'])->name('admin.image.store');
    Route::post('change-password', [AdminController::class, 'changePassword'])->name('admin.change.password');

    // Orders
    Route::get('create-new-order', 'createNewOrder')->name('admin.orders.create.new.order');
    Route::get('orders', 'orders')->name('admin.orders');
    Route::get('orders/{iStatus}', 'orders')->name('admin.orders.with.params');
    Route::get('order/details/{id}', 'orderDetails')->name('admin.orders.details');
    Route::post('order/update-order-status', 'updateOrderStatus')->name('admin.order.updateorderstatus');
    Route::Post('order/comment', 'orderComment')->name('admin.order.comment');

    // Invoices
    Route::get('invoices', 'invoices')->name('admin.invoices');
    Route::get('invoices/{iStatus}', 'invoices')->name('admin.invoices.with.params');
    Route::get('invoice/details/{id}', 'invoiceDetails')->name('admin.invoice.details');
    Route::get('invoice/download/{id}', 'invoiceDownload')->name('admin.invoice.downalod');

    // Products
    Route::get('products', 'products')->name('admin.products');
    Route::get('products/{iStatus}', 'products')->name('admin.products.with.params');
    Route::get('/product/view/{id}', 'productView')->name('admin.product.view');
    Route::get('/product/edit/{id}', 'productEdit')->name('admin.product.edit');
    Route::get('bulk-edit-products/{productIds}', 'bulkEditProducts')->name('admin.bulk.edit.products');
    Route::post('bulk-edit-products-operations', 'bulkEditProductsOperations')->name('admin.bulk.edit.products.operations');

    //categories
    Route::get('categories', 'categories')->name('admin.categories');
    Route::post('add-category', 'addCategory')->name('admin.add.category');
    Route::post('add-subcategory', 'addSubcategory')->name('admin.add.sub.category');

    //Support
    Route::get('tickets', 'tickets')->name('admin.tickets');
    Route::get('tickets/{sParams}', 'tickets')->name('admin.tickets.with.params');
    Route::get('ticket/details/{iId}', 'ticketDetails')->name('admin.ticket.details');

  });


  // Piepz Products
  Route::controller(PiepzController::class)->prefix('admin')->group(function () {

    Route::get('piepz/products', 'index')->name('admin.piepz.products');
    Route::get('piepz/packages', 'packages')->name('admin.piepz.packages');
    Route::get('piepz/update-package/{id}', 'updatepackage')->name('update-package');
    Route::post('update-package', 'updatePackage1')->name('update.package');
    Route::get('piepz/addons', 'addons')->name('admin.piepz.addons');
    Route::post('add-addon', 'addAddon')->name('add-addon');
    Route::post('piepz/addon-status', 'addonStatus')->name('addon.status');
    Route::post('update-addon', 'updateAddon')->name('update-addon');
    Route::get('edit-addon', 'editAddon')->name('edit-addon');
    Route::get('piepz/marketplaces', 'marketplaces')->name('admin.piepz.marketplaces');
    Route::post('add-marketplace', 'addMarketplace')->name('add-marketplace');
    Route::post('piepz/marketplace-status', 'marketplaceStatus')->name('marketplace.status');
    Route::post('update-marketplace', 'updateMarketplace')->name('update-marketplace');
    Route::get('edit-marketplace', 'editMarketplace')->name('edit-marketplace');
    Route::get('piepz/functionalities', 'functionalities')->name('admin.piepz.functionalities');
    Route::post('add-func', 'addFunctionality')->name('add-func');
    Route::post('update-fnc', 'updateFunctionality')->name('update-fnc');
    Route::get('edit-fnc', 'editFunctionality')->name('edit-fnc');
    Route::post('piepz/fnc-status', 'fncStatus')->name('fnc.status');
    Route::get('piepz/store', 'store')->name('admin.piepz.store');

  });

  // Products
  Route::controller(ProductController::class)->prefix('admin')->group(function () {
    Route::get('/product/add', 'productAdd')->name('admin.products.add');
    Route::post('/product/delete', 'productDelete')->name('admin.delete.product');
    Route::post('/product/shipping', 'productShipping')->name('add.product.shipping');
    Route::post('/product/store', 'productStore')->name('admin.product.store');
    Route::post('/product/update', 'productUpdate')->name('admin.product.update');
    Route::post('/product/images', 'productImages')->name('admin.products.images');
    Route::get('product/product-shipping/{product_shipping}', 'Shippingdestroy')->name('shipping.destroy');
    Route::post('/update-multiple', 'updateMultiple')->name('update-multiple');

  });

  // Import
  Route::controller(ImportProductController::class)->prefix('admin')->group(function () {
    Route::get('import/products', 'index')->name('admin.import.products');
    Route::get('mapping/products', 'mapping')->name('admin.mapping.products');
    Route::get('feed/products', 'uploadFeed')->name('admin.feed.products');
    // Route::post('import/products', 'import')->name('admin.import.products');
  });

  // Support
  Route::controller(SupportController::class)->prefix('admin')->group(function () {
    Route::get('single/ticket/{id?}', 'singleTicket')->name('admin.single.ticket');
  });

}); // Admin Middleware End

# <=== ADMIN USER - End ===>


# <= = = = = = = = = = =  = = = = = = = = = = = VENDOR USER - START = = = = = = = = = = = = = = = = = = = = = =>
Route::post('vendor-check-email-exists', [UserManagement::class, 'CheckEmailExists'])->name('vendor.checkemailexists');

//Registration
Route::controller(AuthVendorController::class)->prefix('auth')->group(function () {
  Route::get('/vendor-confirmation', 'confirmation')->name('vendor.confirmation');
  Route::get('/vendor', 'productsImport')->name('vendor.register');
  Route::post('/productsImport', 'Import')->name('vendor.products.import');
  Route::post('ajaxRequest2', 'ajaxRequestPost2')->name('ajaxRequest.post2');
  Route::post('vendor-email-verify', 'vendorExist')->name('vendorexist');
});

// Vendor Middleware Start
Route::middleware(['vendor'])->group(function () {

  Route::controller(VendorController::class)->prefix('vendor')->group(function () {
    // Dashboard
    Route::get('dashboard', 'index')->name('vendor.dashboard');

    // Partner Profile
    Route::get('/v-profile', [VendorController::class, 'myProfile'])->name('vendor.profile.setting');
    Route::post('/v-profile', [VendorController::class, 'updateProfile'])->name('vendor.update.profile');
    Route::post('/v-image-upload', [VendorController::class, 'profileImage'])->name('vendor.image.store');
    Route::post('/v-change-password', [VendorController::class, 'changePassword'])->name('vendor.change.password');

    // Orders
    Route::get('orders', 'orders')->name('vendor.orders');
    Route::get('orders/{iStatus}', 'orders')->name('vendor.orders.with.params');
    Route::get('order/details/{id}', 'orderDetails')->name('vendor.orders.details');
    Route::get('order/invoice', 'orderInvoice')->name('vendor.orders.invoice');
    Route::post('order/update-order-status', 'updateOrderStatus')->name('vendor.order.updateorderstatus');

    // Invoices
    Route::get('invoices', 'invoices')->name('vendor.invoices');
    Route::get('invoices/{iStatus}', 'invoices')->name('vendor.invoices.with.params');
    Route::get('invoice/details/{id}', 'invoiceDetails')->name('vendor.invoice.details');
    Route::get('invoice/download/{id}', 'invoiceDownload')->name('vendor.invoice.downalod');

    // Products
    Route::get('products', 'products')->name('vendor.products');
    Route::get('products/{iStatus}', 'products')->name('vendor.products.with.params');
    Route::get('bulk-edit-products/{productIds}', 'bulkEditProducts')->name('vendor.bulk.edit.products');
    Route::post('bulk-edit-products-operations', 'bulkEditProductsOperations')->name('vendor.bulk.edit.products.operations');

    //Support
    Route::get('tickets', 'tickets')->name('vendor.tickets');
    Route::get('tickets/{sParams}', 'tickets')->name('vendor.tickets.with.params');
    Route::get('ticket/details/{iId}', 'ticketDetails')->name('vendor.ticket.details');


  });

  //Account
  Route::controller(VendorController::class)->prefix('vendor/my-account')->group(function () {
    Route::get('/feedback', 'feedback')->name('vendor.myaccount.feedback');
    Route::get('/page', 'page')->name('vendor.myaccount.myaccount');
    Route::get('/user-information', 'information')->name('vendor.myaccount.user.information');
    Route::get('/invoice-information', 'invoiceInformation')->name('vendor.myaccount.invoice.information');
    Route::get('/sync', 'sync')->name('vendor.myaccount.sync');
    Route::get('/packages', 'packages')->name('vendor.myaccount.packages');
  });


  //Vendor Products
  Route::controller(VendorProductController::class)->prefix('vendor')->group(function () {
    // Route::get('/products', 'products')->name('vendor.products');
    Route::get('/products/customization', 'productCustomization')->name('vendor.products.customization');
    Route::get('/product/add', 'productAdd')->name('vendor.products.add');
    Route::get('/product/delete/{id}', 'productDelete')->name('vendor.delete.product');
    Route::post('/product/store', 'productStore')->name('vendor.product.store');
    Route::post('/product/update', 'productUpdate')->name('vendor.product.update');
    Route::get('/product/edit/{id}', 'productEdit')->name('vendor.edit.product');
    Route::get('/product/view/{id}', 'productView')->name('vendor.product.view');
    Route::get('/products/bulk-edit-products', 'BulkEditProducts')->name('vendor.products.bulkeditproduts');
  });


  // Vendor Product Import
  Route::controller(VendorImportProductController::class)->prefix('vendor')->group(function () {
    Route::get('import/products', 'index')->name('vendor.import.products');
    Route::get('mapping/products', 'mapping')->name('vendor.mapping.products');
    Route::get('feed/products', 'uploadFeed')->name('vendor.feed.products');
  });


  // // Vendor Support
  // Route::controller(VendorSupportController::class)->prefix('vendor')->group(function () {
  //   Route::get('tickets', 'index')->name('vendor.tickets');
  //   Route::get('single/ticket', 'singleTicket')->name('vendor.single.ticket');
  // });

}); // Vendor Middleware End

# <= = = = = = = = = = =  = = = = = = = = = = = VENDOR USER - End = = = = = = = = = = = = = = = = = = = = = =>


# <=== PARTNER USER - End ===>

// Partner Middleware End
Route::middleware(['partner'])->group(function () {

  // Add-Ons
  Route::controller(PartnerAddOnsController::class)->prefix('partner')->group(function () {

    // partner Profile
    Route::get('/p-profile', [PartnerController::class, 'myProfile'])->name('partner.profile.setting');
    Route::post('/p-profile', [PartnerController::class, 'updateProfile'])->name('partner.update.profile');
    Route::post('/p-image-upload', [PartnerController::class, 'profileImage'])->name('partner.image.store');
    Route::post('/p-change-password', [PartnerController::class, 'changePassword'])->name('partner.change.password');


    Route::get('/add-ons/choice', 'choice')->name('partner.add-ons-choice');
    Route::get('/add-ons/services', 'services')->name('partner.add-ons-services');
    Route::get('/add-ons/marketplaces', 'marketplaces')->name('partner.add-ons-marketplaces');
    Route::get('/add-ons/invoices', 'invoices')->name('partner.add-ons-invoices');
    Route::get('/add-ons/accounting-tools', 'accountingTools')->name('partner.add-ons-accounting-tools');
    Route::get('/add-ons/accounting-tools-revenue', 'accountingToolsRevenue')->name('partner.add-ons-accounting-tools-revenue');
    Route::get('/add-ons/accounting-tools-cost', 'accountingToolsCost')->name('partner.add-ons-accounting-tools-cost');
    Route::get('/add-ons/accounting-tools-vat', 'accountingToolsVat')->name('partner.add-ons-accounting-tools-vat');
    Route::get('/add-ons/profit-calculator', 'profitCalculator')->name('partner.add-ons-profit-calculator');
    Route::get('/add-ons/webshop', 'webshop')->name('partner.add-ons-webshop');
  });

  // Partner Controller
  Route::controller(PartnerController::class)->prefix('partner')->group(function () {

    // Dashboard
    Route::get('dashboard', 'index')->name('partner.dashboard');

    // Feedback
    Route::get('/feedback', 'feedback')->name('partner.feedback');

    // Support
    Route::get('support', 'support')->name('partner.support');

    // Chat
    Route::get('chat', 'chat')->name('partner.chat');

    // Account
    Route::get('/my-account', 'account')->name('parnter.myaccount');
    Route::get('/user-information', 'information')->name('partner.user.information');
    Route::get('/invoice-information', 'invoiceInformation')->name('partner.invoice.information');
    Route::get('/sync', 'sync')->name('partner.sync');
    Route::get('/sync-piepz', 'syncPiepz')->name('partner.sync-piepz');

    //Orders
    Route::get('orders', 'orders')->name('partner.orders');
    Route::get('orders/{iStatus}', 'orders')->name('partner.orders.with.params');
    Route::get('order/details/{id}', 'orderDetails')->name('partner.order.details');
    Route::get('order/invoice', 'orderInvoice')->name('partner.order.invoice');

    // Invoices
    Route::get('invoices', 'invoices')->name('partner.invoices');
    Route::get('invoices/{iStatus}', 'invoices')->name('partner.invoices.with.params');
    Route::get('invoice/details/{id}', 'invoiceDetails')->name('partner.invoice.details');
    Route::get('invoice/download/{id}', 'invoiceDownload')->name('partner.invoice.downalod');


    //Support
    Route::get('tickets', 'tickets')->name('partner.tickets');
    Route::get('tickets/{sParams}', 'tickets')->name('partner.tickets.with.params');
    Route::get('ticket/details/{iId}', 'ticketDetails')->name('partner.ticket.details');


  });


  //Partner Products
  Route::controller(ProductPanelController::class)->prefix('partner/products')->group(function () {
    Route::get('/home', 'search')->name('partner.products.filter');
    Route::post('addToCart', 'addToCart')->name('addToCart');
    Route::post('updateCart', 'updateCart')->name('updateCart');
    Route::post('removeCart', 'removeCart')->name('removeCart');
    Route::post('placOrder', 'placOrder')->name('placOrder');
    Route::post('checkShipping', 'checkShipping')->name('checkShipping');


    // Get categories
    Route::get('get-categories', 'getCategories');
    // Get subcategories based on category
    Route::get('get-subcategories/{category}', 'getSubcategories');

    Route::get('/collection/{data}', 'collection')->name('partner.products.collection');

    Route::get('/view-product/{product}', 'ViewProduct')->name('product_info');
    Route::get('/cart', 'cart')->name('order-cart');
    Route::get('/checkout', 'checkout')->name('checkout');
  });

}); // Partner Middleware End

# <=== PARTNER USER - End ===>


Route::get('products/advance', [UserManagement::class, 'productsDatatable'])->name('products.datatable');
Route::get('updatePass', [UserManagement::class, 'updatePass'])->name('updatePass');


# <=== FRONT END OTHER PAGES - Start ===>

# <=== FRONT END OTHER PAGES - End ===>

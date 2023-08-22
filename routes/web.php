<?php

use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\AdminPanel\Piepz\PiepzController;
use App\Http\Controllers\AdminPanel\Products\ProductController;
use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\auth\partner\AuthPartnerController;
use App\Http\Controllers\auth\vendor\AuthVendorController;
use App\Http\Controllers\Partner\Account\AccountController;
use App\Http\Controllers\Partner\AddOns\PartnerAddOnsController;
use App\Http\Controllers\Partner\OrderPanel\OrderPanelController;
use App\Http\Controllers\Partner\PartnerController;
use App\Http\Controllers\Partner\ProductPanel\ProductPanelController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserManagement;
use App\Http\Controllers\Vendor\Orders\VendorOrderController;
use App\Http\Controllers\Vendor\Products\VendorImportProductController;
use App\Http\Controllers\Vendor\Products\VendorProductController;
use App\Http\Controllers\Vendor\Support\VendorSupportController;
use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Support\Facades\Route;

$controller_path = 'App\Http\Controllers';
Route::get('/dashboard/analytics', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');

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

// Cache clear route

Route::get('products/advance', [UserManagement::class, 'productsDatatable'])->name('products.datatable');

//payment Routes Start
Route::get('auth/payment', [PaymentController::class, 'payment'])->name('payment');
Route::get('success', [PaymentController::class, 'success'])->name('success');
Route::get('cancel', [PaymentController::class, 'cancel'])->name('cancel');

// authentication

//vendor registration routes
Route::controller(AuthVendorController::class)
    ->prefix('auth')
    ->group(function () {
        route::get('/vendor-confirmation', 'confirmation')->name('vendor.confirmation');
        route::get('/vendor', 'productsImport')->name('vendor.register');
        route::post('/productsImport', 'Import')->name('vendor.products.import');

    });

//Partner registration routes
Route::controller(AuthPartnerController::class)
    ->prefix('auth')
    ->group(function () {
        route::get('/partner-confirmation', 'partnerConfirmation')->name('partner.confirmation');
        route::get('/partner', 'partner')->name('partner');
        Route::post('ajaxRequest', 'ajaxRequestPost')->name('ajaxRequest.post');
        Route::post('ajaxRequest1', 'ajaxRequestPost1')->name('ajaxRequest.post1');

    });

Route::get('/auth/forgot-password-basic', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('auth-reset-password-basic');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::post('/login', [UserManagement::class, 'loginPost'])->name('auth-login-post');
Route::get('/login', [UserManagement::class, 'LoginBasic'])->name('auth-login-basic');
route::get('/logout', [UserManagement::class, 'logout'])->name('logout');

//authentication end

//admin middleware
Route::middleware(['admin'])->group(function () {
    Route::get('/user/approve/{id}', [UserManagement::class, 'userApprove'])->name('user-approve');
// Admin Routes List Start

    Route::controller(PiepzController::class)
        ->prefix('admin')
        ->group(function () {
            route::get('piepz/products', 'index')->name('admin.piepz.products');
            route::get('piepz/packages', 'packages')->name('admin.piepz.packages');
            route::get('piepz/update-package/{id}', 'updatepackage')->name('update-package');
            route::post('update-package', 'updatePackage1')->name('update.package');
            route::get('piepz/addons', 'addons')->name('admin.piepz.addons');
            route::get('piepz/marketplaces', 'marketplaces')->name('admin.piepz.marketplaces');
            route::get('piepz/functionalities', 'functionalities')->name('admin.piepz.functionalities');
            route::get('piepz/store', 'store')->name('admin.piepz.store');
        }); //Admin Products Group

    //
    Route::controller(ProductController::class)
        ->prefix('admin')
        ->group(function () {
            route::get('/products', 'index')->name('admin.products');
            route::get('/products/customization', 'productCustomization')->name('admin.products.customization');
            route::get('/product/add', 'productAdd')->name('admin.product.add');
            route::get('/product/view/{id}', 'productView')->name('vendor.product.view');
            route::get('/product/delete/{id}', 'productDelete')->name('admin.delete.product');
            route::get('/product/edit/{id}', 'productEdit')->name('admin.edit.product');

        });

//Admin Products Group

    Route::controller(ImportProductController::class)
        ->prefix('admin')
        ->group(function () {
            route::get('import/products', 'index')->name('admin.import.products');
            route::get('mapping/products', 'mapping')->name('admin.mapping.products');
            route::get('feed/products', 'uploadFeed')->name('admin.feed.products');
            // route::post('import/products', 'import')->name('admin.import.products');

        }); // Product Import Setup Group

// Product Import Setup Group

    Route::controller(OrderController::class)
        ->prefix('admin')
        ->group(function () {
            route::get('orders', 'index')->name('admin.orders');
            route::get('order/create', 'orderCreate')->name('admin.order.create');
            route::get('order/details', 'orderDetails')->name('admin.order.details');
            route::get('order/invoice', 'orderInvoice')->name('admin.order.invoice');
            route::get('analytics', 'analytics')->name('admin.analytics');
        }); //Order Group

    Route::controller(SupportController::class)
        ->prefix('admin')
        ->group(function () {

            route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
            route::get('tickets', 'index')->name('admin.tickets');
            route::get('single/ticket', 'singleTicket')->name('admin.single.ticket');
        }); // Support Group

    Route::get('/app/user/list', 'App\Http\Controllers\apps\UserList@index')->name('app-user-list');
});

// Admin Route List End
//admin middleware end

// partner middleware

//Partner Add-ons pages
Route::middleware(['partner'])->group(function () {

    Route::controller(PartnerAddOnsController::class)
        ->prefix('partner')
        ->group(function () {
            route::get('/add-ons/choice', 'choice')->name('partner.add-ons-choice');
            route::get('/add-ons/services', 'services')->name('partner.add-ons-services');
            route::get('/add-ons/marketplaces', 'marketplaces')->name('partner.add-ons-marketplaces');
            route::get('/add-ons/invoices', 'invoices')->name('partner.add-ons-invoices');
            route::get('/add-ons/accounting-tools', 'accountingTools')->name('partner.add-ons-accounting-tools');
            route::get('/add-ons/accounting-tools-revenue', 'accountingToolsRevenue')->name(
                'partner.add-ons-accounting-tools-revenue'
            );
            route::get('/add-ons/accounting-tools-cost', 'accountingToolsCost')->name('partner.add-ons-accounting-tools-cost');
            route::get('/add-ons/accounting-tools-vat', 'accountingToolsVat')->name('partner.add-ons-accounting-tools-vat');
            route::get('/add-ons/profit-calculator', 'profitCalculator')->name('partner.add-ons-profit-calculator');
            route::get('/add-ons/webshop', 'webshop')->name('partner.add-ons-webshop');
        });

//Partner pages
    Route::controller(PartnerController::class)
        ->prefix('partner')
        ->group(function () {
            //   route::get('/dashboard', 'index')->name('partner.dashboard');
            route::get('/', 'index')->name('partner.dashboard');
            route::get('/feedback', 'feedback')->name('partner.feedback');
            route::get('support', 'support')->name('partner.support');
            route::get('chat', 'chat')->name('partner.chat');
        });
//Partner Account pages
    Route::controller(AccountController::class)
        ->prefix('partner')
        ->group(function () {
            route::get('/my-account', 'account')->name('parnter.myaccount');
            route::get('/user-information', 'information')->name('partner.user.information');
            route::get('/invoice-information', 'invoiceInformation')->name('partner.invoice.information');
            route::get('/sync', 'sync')->name('partner.sync');
            route::get('/sync-piepz', 'syncPiepz')->name('partner.sync-piepz');
        });

//partner Order Group
    Route::controller(OrderPanelController::class)
        ->prefix('partner')
        ->group(function () {
            route::get('orders', 'index')->name('partner.orders');
            route::get('order/details', 'orderDetails')->name('partner.order.details');
            route::get('order/invoice', 'orderInvoice')->name('partner.order.invoice');
        });

    Route::controller(ProductPanelController::class)
        ->prefix('partner/products')
        ->group(function () {
            route::get('/search', 'search')->name('partner.products.search');
            route::get('/collection', 'collection')->name('partner.products.collection');
            route::get('/view-product', 'ViewProduct')->name('view-product');
            route::get('/cart', 'cart')->name('');
            route::get('/checkout', 'checkout')->name('');
        });

});

//Partner Routes End

//partner middleare end

//vendor middleware
//Vendor Routes Start
Route::middleware(['vendor'])->group(function () {

    Route::controller(VendorController::class)
        ->prefix('vendor')
        ->group(function () {
            //  route::get('/dashboard', 'index')->name('vendor.dashboard');
            route::get('/', 'index')->name('vendor.dashboard');
        });

//vendor my account
    Route::controller(VendorController::class)
        ->prefix('vendor/my-account')
        ->group(function () {
            route::get('/feedback', 'feedback')->name('vendor.feedback');

            route::get('/page', 'page')->name('vendor.myaccount.page');
            route::get('/user-information', 'information')->name('vendor.user.information');
            route::get('/invoice-information', 'invoiceInformation')->name('vendor.invoice.information');
            route::get('/sync', 'sync')->name('vendor.sync');
            route::get('/packages', 'packages')->name('vendor.packages');
        });
//vendor products
    Route::controller(VendorProductController::class)
        ->prefix('vendor')
        ->group(function () {
            route::get('/products', 'index')->name('vendor.products');
            route::get('/products/customization', 'productCustomization')->name('vendor.products.customization');
            route::get('/product/add', 'productAdd')->name('vendor.product.add');
        });
// Product Import Setup Group
    Route::controller(VendorImportProductController::class)
        ->prefix('vendor')
        ->group(function () {
            route::get('import/products', 'index')->name('vendor.import.products');
            route::get('mapping/products', 'mapping')->name('vendor.mapping.products');
            route::get('feed/products', 'uploadFeed')->name('vendor.feed.products');
        });
//Order Group
    Route::controller(VendorOrderController::class)
        ->prefix('vendor')
        ->group(function () {
            route::get('orders', 'index')->name('vendor.orders');
            route::get('order/details', 'orderDetails')->name('vendor.order.details');
            route::get('order/invoice', 'orderInvoice')->name('vendor.order.invoice');
        });

    Route::controller(VendorSupportController::class)
        ->prefix('vendor')
        ->group(function () {
            route::get('tickets', 'index')->name('vendor.tickets');
            route::get('single/ticket', 'singleTicket')->name('vendor.single.ticket');
        });

}); // Support Group
//Vendor Routes End

//vendor middleare end

// frontEnd Controller Starts

// Main Page Route
Route::get('/', $controller_path . '\dashboard\Analytics@home')->name('dashboard-home');
// Route::get('/admin  ', $controller_path . '\dashboard\Analytics@admin')->name('dashboard-analytics-2');
// Route::get('/dashboard/crm', $controller_path . '\dashboard\Crm@index')->name('dashboard-crm');
// Route::get('/dashboard/ecommerce', $controller_path . '\dashboard\Ecommerce@index')->name('dashboard-ecommerce');

// locale
Route::get('lang/{locale}', $controller_path . '\language\LanguageController@swap');

// layout
Route::get('/layouts/collapsed-menu', $controller_path . '\layouts\CollapsedMenu@index')->name(
    'layouts-collapsed-menu'
);
Route::get('/layouts/content-navbar', $controller_path . '\layouts\ContentNavbar@index')->name(
    'layouts-content-navbar'
);
Route::get('/layouts/content-nav-sidebar', $controller_path . '\layouts\ContentNavSidebar@index')->name(
    'layouts-content-nav-sidebar'
);
Route::get('/layouts/navbar-full', $controller_path . '\layouts\NavbarFull@index')->name('layouts-navbar-full');
Route::get('/layouts/navbar-full-sidebar', $controller_path . '\layouts\NavbarFullSidebar@index')->name(
    'layouts-navbar-full-sidebar'
);
Route::get('/layouts/horizontal', $controller_path . '\layouts\Horizontal@index')->name('dashboard-analytics-3');
Route::get('/layouts/vertical', $controller_path . '\layouts\Vertical@index')->name('dashboard-analytics-4');
Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name(
    'layouts-without-navbar'
);
Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');
Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');
Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');

// apps
Route::get('/app/email', $controller_path . '\apps\Email@index')->name('app-email');
Route::get('/app/chat', $controller_path . '\apps\Chat@index')->name('app-chat');
Route::get('/app/calendar', $controller_path . '\apps\Calendar@index')->name('app-calendar');
Route::get('/app/kanban', $controller_path . '\apps\Kanban@index')->name('app-kanban');
Route::get('/app/invoice/list', $controller_path . '\apps\InvoiceList@index')->name('app-invoice-list');
Route::get('/app/invoice/preview', $controller_path . '\apps\InvoicePreview@index')->name('app-invoice-preview');
Route::get('/app/invoice/print', $controller_path . '\apps\InvoicePrint@index')->name('app-invoice-print');
Route::get('/app/invoice/edit', $controller_path . '\apps\InvoiceEdit@index')->name('app-invoice-edit');
Route::get('/app/invoice/add', $controller_path . '\apps\InvoiceAdd@index')->name('app-invoice-add');
Route::get('/app/user/view/account', $controller_path . '\apps\UserViewAccount@index')->name('app-user-view-account');
Route::get('/app/user/view/security', $controller_path . '\apps\UserViewSecurity@index')->name(
    'app-user-view-security'
);
Route::get('/app/user/view/billing', $controller_path . '\apps\UserViewBilling@index')->name('app-user-view-billing');
Route::get('/app/user/view/notifications', $controller_path . '\apps\UserViewNotifications@index')->name(
    'app-user-view-notifications'
);
Route::get('/app/user/view/connections', $controller_path . '\apps\UserViewConnections@index')->name(
    'app-user-view-connections'
);
Route::get('/app/access-roles', $controller_path . '\apps\AccessRoles@index')->name('app-access-roles');
Route::get('/app/access-permission', $controller_path . '\apps\AccessPermission@index')->name('app-access-permission');

// pages
Route::get('/pages/profile-user', $controller_path . '\pages\UserProfile@index')->name('pages-profile-user');
Route::get('/pages/profile-teams', $controller_path . '\pages\UserTeams@index')->name('pages-profile-teams');
Route::get('/pages/profile-projects', $controller_path . '\pages\UserProjects@index')->name('pages-profile-projects');
Route::get('/pages/profile-connections', $controller_path . '\pages\UserConnections@index')->name(
    'pages-profile-connections'
);
Route::get('/pages/account-settings-account', $controller_path . '\pages\AccountSettingsAccount@index')->name(
    'pages-account-settings-account'
);
Route::get('/pages/account-settings-security', $controller_path . '\pages\AccountSettingsSecurity@index')->name(
    'pages-account-settings-security'
);
Route::get('/pages/account-settings-billing', $controller_path . '\pages\AccountSettingsBilling@index')->name(
    'pages-account-settings-billing'
);
Route::get(
    '/pages/account-settings-notifications',
    $controller_path . '\pages\AccountSettingsNotifications@index'
)->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name(
    'pages-account-settings-connections'
);
Route::get('/pages/faq', $controller_path . '\pages\Faq@index')->name('pages-faq');
Route::get('/pages/help-center-landing', $controller_path . '\pages\HelpCenterLanding@index')->name(
    'pages-help-center-landing'
);
Route::get('/pages/help-center-categories', $controller_path . '\pages\HelpCenterCategories@index')->name(
    'pages-help-center-categories'
);
Route::get('/pages/help-center-article', $controller_path . '\pages\HelpCenterArticle@index')->name(
    'pages-help-center-article'
);
Route::get('/pages/pricing', $controller_path . '\pages\Pricing@index')->name('pages-pricing');
Route::get('/pages/pricing-front', $controller_path . '\pages\PricingFront@index')->name('pages-pricing-front');
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name(
    'pages-misc-under-maintenance'
);
Route::get('/pages/misc-comingsoon', $controller_path . '\pages\MiscComingSoon@index')->name('pages-misc-comingsoon');
Route::get('/pages/misc-not-authorized', $controller_path . '\pages\MiscNotAuthorized@index')->name(
    'pages-misc-not-authorized'
);

Route::get('/auth/login-front', $controller_path . '\authentications\LoginFront@index')->name('auth-login-front');
Route::get('/auth/login-cover', $controller_path . '\authentications\LoginCover@index')->name('auth-login-cover');
Route::get('/auth/register-front', $controller_path . '\authentications\RegisterFront@index')->name(
    'auth-register-front'
);
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name(
    'auth-register-basic'
);
Route::get('/auth/register-cover', $controller_path . '\authentications\RegisterCover@index')->name(
    'auth-register-cover'
);
Route::get('/auth/register-multisteps', $controller_path . '\authentications\RegisterMultiSteps@index')->name(
    'auth-register-multisteps'
);
Route::get('/auth/verify-email-front', $controller_path . '\authentications\VerifyEmailFront@index')->name(
    'auth-verify-email-front'
);
Route::get('/auth/verify-email-basic', $controller_path . '\authentications\VerifyEmailBasic@index')->name(
    'auth-verify-email-basic'
);
Route::get('/auth/verify-email-cover', $controller_path . '\authentications\VerifyEmailCover@index')->name(
    'auth-verify-email-cover'
);
Route::get('/auth/reset-password-front', $controller_path . '\authentications\ResetPasswordFront@index')->name(
    'auth-reset-password-front'
);

Route::get('/auth/reset-password-cover', $controller_path . '\authentications\ResetPasswordCover@index')->name(
    'auth-reset-password-cover'
);
Route::get('/auth/forgot-password-front', $controller_path . '\authentications\ForgotPasswordFront@index')->name(
    'auth-forgot-password-front'
);

Route::get('/auth/forgot-password-cover', $controller_path . '\authentications\ForgotPasswordCover@index')->name(
    'auth-forgot-password-cover'
);
Route::get('/auth/two-steps-front', $controller_path . '\authentications\TwoStepsFront@index')->name(
    'auth-two-steps-front'
);
Route::get('/auth/two-steps-basic', $controller_path . '\authentications\TwoStepsBasic@index')->name(
    'auth-two-steps-basic'
);
Route::get('/auth/two-steps-cover', $controller_path . '\authentications\TwoStepsCover@index')->name(
    'auth-two-steps-cover'
);

// wizard example
Route::get('/wizard/ex-checkout', $controller_path . '\wizard_example\Checkout@index')->name('wizard-ex-checkout');
Route::get('/wizard/ex-property-listing', $controller_path . '\wizard_example\PropertyListing@index')->name(
    'wizard-ex-property-listing'
);
Route::get('/wizard/ex-create-deal', $controller_path . '\wizard_example\CreateDeal@index')->name(
    'wizard-ex-create-deal'
);

// modal
Route::get('/modal-examples', $controller_path . '\modal\ModalExample@index')->name('modal-examples');

// cards
Route::get('/cards/basic', $controller_path . '\cards\CardBasic@index')->name('cards-basic');
Route::get('/cards/advance', $controller_path . '\cards\CardAdvance@index')->name('cards-advance');
Route::get('/cards/statistics', $controller_path . '\cards\CardStatistics@index')->name('cards-statistics');
Route::get('/cards/analytics', $controller_path . '\cards\CardAnalytics@index')->name('cards-analytics');
Route::get('/cards/actions', $controller_path . '\cards\CardActions@index')->name('cards-actions');

// User Interface
Route::get('/ui/accordion', $controller_path . '\user_interface\Accordion@index')->name('ui-accordion');
Route::get('/ui/alerts', $controller_path . '\user_interface\Alerts@index')->name('ui-alerts');
Route::get('/ui/badges', $controller_path . '\user_interface\Badges@index')->name('ui-badges');
Route::get('/ui/buttons', $controller_path . '\user_interface\Buttons@index')->name('ui-buttons');
Route::get('/ui/carousel', $controller_path . '\user_interface\Carousel@index')->name('ui-carousel');
Route::get('/ui/collapse', $controller_path . '\user_interface\Collapse@index')->name('ui-collapse');
Route::get('/ui/dropdowns', $controller_path . '\user_interface\Dropdowns@index')->name('ui-dropdowns');
Route::get('/ui/footer', $controller_path . '\user_interface\Footer@index')->name('ui-footer');
Route::get('/ui/list-groups', $controller_path . '\user_interface\ListGroups@index')->name('ui-list-groups');
Route::get('/ui/modals', $controller_path . '\user_interface\Modals@index')->name('ui-modals');
Route::get('/ui/navbar', $controller_path . '\user_interface\Navbar@index')->name('ui-navbar');
Route::get('/ui/offcanvas', $controller_path . '\user_interface\Offcanvas@index')->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', $controller_path . '\user_interface\PaginationBreadcrumbs@index')->name(
    'ui-pagination-breadcrumbs'
);
Route::get('/ui/progress', $controller_path . '\user_interface\Progress@index')->name('ui-progress');
Route::get('/ui/spinners', $controller_path . '\user_interface\Spinners@index')->name('ui-spinners');
Route::get('/ui/tabs-pills', $controller_path . '\user_interface\TabsPills@index')->name('ui-tabs-pills');
Route::get('/ui/toasts', $controller_path . '\user_interface\Toasts@index')->name('ui-toasts');
Route::get('/ui/tooltips-popovers', $controller_path . '\user_interface\TooltipsPopovers@index')->name(
    'ui-tooltips-popovers'
);
Route::get('/ui/typography', $controller_path . '\user_interface\Typography@index')->name('ui-typography');

// extended ui
Route::get('/extended/ui-avatar', $controller_path . '\extended_ui\Avatar@index')->name('extended-ui-avatar');
Route::get('/extended/ui-blockui', $controller_path . '\extended_ui\BlockUI@index')->name('extended-ui-blockui');
Route::get('/extended/ui-drag-and-drop', $controller_path . '\extended_ui\DragAndDrop@index')->name(
    'extended-ui-drag-and-drop'
);
Route::get('/extended/ui-media-player', $controller_path . '\extended_ui\MediaPlayer@index')->name(
    'extended-ui-media-player'
);
Route::get('/extended/ui-perfect-scrollbar', $controller_path . '\extended_ui\PerfectScrollbar@index')->name(
    'extended-ui-perfect-scrollbar'
);
Route::get('/extended/ui-star-ratings', $controller_path . '\extended_ui\StarRatings@index')->name(
    'extended-ui-star-ratings'
);
Route::get('/extended/ui-sweetalert2', $controller_path . '\extended_ui\SweetAlert@index')->name(
    'extended-ui-sweetalert2'
);
Route::get('/extended/ui-text-divider', $controller_path . '\extended_ui\TextDivider@index')->name(
    'extended-ui-text-divider'
);
Route::get('/extended/ui-timeline-basic', $controller_path . '\extended_ui\TimelineBasic@index')->name(
    'extended-ui-timeline-basic'
);
Route::get('/extended/ui-timeline-fullscreen', $controller_path . '\extended_ui\TimelineFullscreen@index')->name(
    'extended-ui-timeline-fullscreen'
);
Route::get('/extended/ui-tour', $controller_path . '\extended_ui\Tour@index')->name('extended-ui-tour');
Route::get('/extended/ui-treeview', $controller_path . '\extended_ui\Treeview@index')->name('extended-ui-treeview');
Route::get('/extended/ui-misc', $controller_path . '\extended_ui\Misc@index')->name('extended-ui-misc');

// icons
Route::get('/icons/tabler', $controller_path . '\icons\Tabler@index')->name('icons-tabler');
Route::get('/icons/font-awesome', $controller_path . '\icons\FontAwesome@index')->name('icons-font-awesome');

// form elements
Route::get('/forms/basic-inputs', $controller_path . '\form_elements\BasicInput@index')->name('forms-basic-inputs');
Route::get('/forms/input-groups', $controller_path . '\form_elements\InputGroups@index')->name('forms-input-groups');
Route::get('/forms/custom-options', $controller_path . '\form_elements\CustomOptions@index')->name(
    'forms-custom-options'
);
Route::get('/forms/editors', $controller_path . '\form_elements\Editors@index')->name('forms-editors');
Route::get('/forms/file-upload', $controller_path . '\form_elements\FileUpload@index')->name('forms-file-upload');
Route::get('/forms/pickers', $controller_path . '\form_elements\Picker@index')->name('forms-pickers');
Route::get('/forms/selects', $controller_path . '\form_elements\Selects@index')->name('forms-selects');
Route::get('/forms/sliders', $controller_path . '\form_elements\Sliders@index')->name('forms-sliders');
Route::get('/forms/switches', $controller_path . '\form_elements\Switches@index')->name('forms-switches');
Route::get('/forms/extras', $controller_path . '\form_elements\Extras@index')->name('forms-extras');

// form layouts
Route::get('/form/layouts-vertical', $controller_path . '\form_layouts\VerticalForm@index')->name(
    'form-layouts-vertical'
);
Route::get('/form/layouts-horizontal', $controller_path . '\form_layouts\HorizontalForm@index')->name(
    'form-layouts-horizontal'
);
Route::get('/form/layouts-sticky', $controller_path . '\form_layouts\StickyActions@index')->name('form-layouts-sticky');

// form wizards
Route::get('/form/wizard-numbered', $controller_path . '\form_wizard\Numbered@index')->name('form-wizard-numbered');
Route::get('/form/wizard-icons', $controller_path . '\form_wizard\Icons@index')->name('form-wizard-icons');
Route::get('/form/validation', $controller_path . '\form_validation\Validation@index')->name('form-validation');

// tables
Route::get('/tables/basic', $controller_path . '\tables\Basic@index')->name('tables-basic');
Route::get('/tables/datatables-basic', $controller_path . '\tables\DatatableBasic@index')->name(
    'tables-datatables-basic'
);
Route::get('/tables/datatables-advanced', $controller_path . '\tables\DatatableAdvanced@index')->name(
    'tables-datatables-advanced'
);
Route::get('/tables/datatables-extensions', $controller_path . '\tables\DatatableExtensions@index')->name(
    'tables-datatables-extensions'
);

// charts
Route::get('/charts/apex', $controller_path . '\charts\ApexCharts@index')->name('charts-apex');
Route::get('/charts/chartjs', $controller_path . '\charts\ChartJs@index')->name('charts-chartjs');

// maps
Route::get('/maps/leaflet', $controller_path . '\maps\Leaflet@index')->name('maps-leaflet');

// laravel example
Route::get('/laravel/user-management', [UserManagement::class, 'UserManagement'])->name(
    'laravel-example-user-management'
);
Route::resource('/user-list', UserManagement::class);

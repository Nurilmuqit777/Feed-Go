<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;

Route::get('/', [HomepageController::class, 'index'])->name('beranda');
Route::get('/artikel', [BlogController::class, 'index'])->name('artikel');
Route::get('/produk', [ProductController::class, 'index'])->name('produk');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/artikel/{slug}', [BlogController::class, 'show'])->name('article.show');
Route::get('/tentang-kami', [AboutUsController::class, 'index'])->name('tentangkami');
Route::get('/kebijakan-privasi',[HomepageController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/syarat-dan-ketentuan',[HomepageController::class, 'termsConditions'])->name('terms.conditions');
Route::get('/kontak-kami', [HomepageController::class, 'contact'])->name('contact');
Route::post('/midtrans/notification', [OrderController::class, 'notification']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/product', [AdminController::class, 'product'])->name('admin.product');
    Route::get('/admin/order', [AdminController::class, 'order'])->name('admin.order');
    Route::get('/admin/user-profile', [AdminController::class, 'profile'])->name('admin.userprofile');
    Route::get('/admin/delivery', [AdminController::class, 'delivery'])->name('admin.delivery');
    Route::get('/admin/payment', [AdminController::class, 'payment'])->name('admin.payment');
    Route::get('/admin/report', [AdminController::class, 'report'])->name('admin.report');
    Route::get('/admin/article', [AdminController::class, 'article'])->name('admin.article');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');
    Route::get('/admin/sales-data', [AdminController::class, 'getSalesData'])->name('admin.sales-data');
});

Route::middleware(['auth', 'role:user', 'verified'])->group(function(){
    Route::get('/user/cart',[ProductController::class,'indexCart'])->name('user.cart');
    Route::get('/user/checkout',[ProductController::class,'indexCheckout'])->name('user.checkout');
    Route::get('/user/order', [OrderController::class, 'index'])->name('user.orders');
    Route::get('/user/order/{invoice_number}', [OrderController::class, 'show'])->name('user.order-detail');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

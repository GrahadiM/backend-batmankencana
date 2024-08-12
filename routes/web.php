<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::controller(App\Http\Controllers\FrontendController::class)->name('fe.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/detail/{id}', 'product_detail')->name('product_detail');
    Route::get('/category', 'category')->name('category');
    Route::get('/category/{id}', 'category_detail')->name('category_detail');
    Route::get('/contact', 'contact')->name('contact');
    Route::middleware(['auth'])->group(function() {
        // History
        Route::get('/history', 'history')->name('history');
        Route::get('/historyProduct', 'historyProduct')->name('historyProduct');
        // Profile
        Route::get('/profile', 'profile')->name('profile');
        Route::post('/profile-update', 'profileUpdate')->name('profileUpdate');
        Route::post('/profile-password', 'profilePassword')->name('profilePassword');
        // Wishlist
        Route::get('/wishlist', 'wishlist')->name('wishlist');
        Route::post('/wishlist', 'wishlistAdd')->name('wishlistAdd');
        Route::post('/wishlistIgnore', 'wishlistIgnore')->name('wishlistIgnore');
        // Cart
        Route::get('/cart', 'cart')->name('cart');
        Route::post('/cart', 'cartAdd')->name('cartAdd');
        Route::post('/cartMin', 'cartMin')->name('cartMin');
        Route::post('/cartIgnore', 'cartIgnore')->name('cartIgnore');
        // Checkout
        Route::post('/checkout', 'checkout')->name('checkout');
        Route::post('/pay', 'pay')->name('pay');
    });
});

Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => true,
    'reset'    => false,
    'confirm'  => false,
    'verify'   => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('products_qty', App\Http\Controllers\Admin\StokProductController::class);
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);
    Route::controller(App\Http\Controllers\Admin\OrderController::class)->name('orders.')->group(function () {
        Route::get('/status/{id}', 'status')->name('status');
        Route::put('/status/{id}', 'status_update')->name('status_update');
    });
    Route::resource('order_products', App\Http\Controllers\Admin\OrderProductController::class);
    Route::resource('histories', App\Http\Controllers\Admin\HistoryController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});

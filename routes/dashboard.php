<?php
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::middleware('auth')->group(function() {
            Route::prefix('dashboard')->group(function() {
                Route::get('/', Dashboard\DashboardController::class)->name('dashboard');
                Route::resource('users', Dashboard\UserController::class);
                Route::resource('orders',Dashboard\OrderController::class);
                Route::get('order_sync', [Dashboard\OrderController::class, 'orderSync'])->name('ordersSync');
                Route::get('orders_updated', [Dashboard\OrderController::class, 'orders_updated'])->name('orders_updated');
                Route::get('orders_upload', [Dashboard\OrderController::class, 'orders_upload'])->name('orders_upload');
                Route::post('orders/excel/upload', [Dashboard\OrderController::class, 'orders_excel_upload'])->name('orders_excel_upload');
                Route::orderStatus(Order::PAID_STATUS);
                Route::orderStatus(Order::PENDING_STATUS);
                Route::orderStatus(Order::PARTIALLY_REFUNDED_STATUS);
                Route::orderStatus(Order::REFUNDED_STATUS);
                Route::orderStatus(Order::VOIDED_STATUS);

                Route::get('updatedOrders',[Dashboard\OrderController::class,'updatedStatusOrders']);
            });
        });
    require __DIR__.'/auth.php';
});
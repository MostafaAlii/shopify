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
            });
        });
    require __DIR__.'/auth.php';
});

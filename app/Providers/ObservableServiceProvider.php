<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;

class ObservableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function boot() {
        /*$modelsPath = app_path('Models');
        $observersPath = app_path('Observers');
        foreach (scandir($modelsPath) as $file) {
            if ($file === '.' || $file === '..' || !str_ends_with($file, '.php')) {
                continue;
            }
            $model = 'App\\Models\\' . basename($file, '.php');
            $observer = 'App\\Observers\\' . basename($file, '.php') . 'Observer';
            if (class_exists($observer)) {
                $model::observe($observer);
            }
        }*/
        User::observe(\App\Observers\UserObserver::class);
    }
}

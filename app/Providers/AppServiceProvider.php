<?php

namespace App\Providers;

use App\Models\Booking;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('backend.components.nav', function ($view) {
            $notification_bookings = Booking::where('status', 0)->get();
            $view->with(compact('notification_bookings'));
        });
    }
}

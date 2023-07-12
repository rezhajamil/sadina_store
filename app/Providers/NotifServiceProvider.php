<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Support\ServiceProvider;

class NotifServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->view->composer('layouts.app', function ($view) {
            if (auth()->user()) {
                $notif = Notification::with(['user', 'order'])->where('user_id', auth()->user()->id)->where('target', 'user')->orderBy('is_read')->limit(3)->get();
                $notif_count = Notification::where('user_id', auth()->user()->id)->where('target', 'user')->where('is_read', 0)->count();
            } else {
                $notif = [];
                $notif_count = [];
            }
            // ddd($notif_count);
            $view->with('notif', $notif)->with('notif_count', $notif_count); // replace $carts with your actual data
        });

        $this->app->view->composer('layouts.dashboard.app', function ($view) {
            if (auth()->user()) {
                $notif = Notification::with(['user', 'order'])->where('target', 'admin')->orderBy('is_read')->limit(3)->get();
                $notif_count = Notification::where('target', 'admin')->where('is_read', 0)->count();
            } else {
                $notif = [];
                $notif_count = [];
            }
            // ddd($notif_count);
            $view->with('notif', $notif)->with('notif_count', $notif_count); // replace $carts with your actual data
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

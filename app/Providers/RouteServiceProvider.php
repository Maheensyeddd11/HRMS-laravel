<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     */
    public const HOME = '/employees'; // 👈 Force Laravel to use this

    public function register(): void {}
    public function boot(): void {}
}

<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Menu;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public array $data;
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $menu = Menu::all();
        Paginator::useBootstrap();
        View::share("menu",$menu);
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}

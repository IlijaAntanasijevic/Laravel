<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $this->data["menu"] = [
            [
                "name" => "Home",
                "route" => "home"
            ],
            [
                "name" => "Contact",
                "route" => "contact"
            ]

        ];

        View::share("menu",$this->data["menu"]);
    }
}

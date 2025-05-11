<?php

namespace App\Providers;

use App\Models\Kafe;
use App\Models\Menu;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Blade::directive('idr', function ($expression) {
            return "Rp <?php echo number_format($expression, 0, ',', '.'); ?>";
        });
    }
}

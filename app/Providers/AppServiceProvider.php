<?php

namespace App\Providers;

use App\Models\Kafe;
use App\Models\Menu;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Storage::macro('url', function ($path) {
            return rtrim(config('filesystems.disks.public.url'), '/') . '/' . ltrim($path, '/');
        });
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

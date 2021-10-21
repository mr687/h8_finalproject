<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
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

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('date', fn($exp) => "<?php echo ($exp)->format('m-d-Y'); ?>");
        Blade::directive('money', fn($exp) => "<?php echo 'Rp ' . number_format($exp, 0, ',', '.'); ?>");
    }
}

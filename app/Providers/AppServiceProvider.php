<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
        Paginator::useBootstrapFive();

        Blade::if('admin', function () {
            return Auth::check() && Auth::user()->isAdmin();
        });

        Blade::directive('status', function ($expression) {
            return "<?php echo {$expression} ? 'Так' : 'Ні' ?>";
        });

        Blade::directive('comment', function ($expression) {
            return "<?php echo ({$expression} != null) ? {$expression} : '-' ?>";
        });
    }
}

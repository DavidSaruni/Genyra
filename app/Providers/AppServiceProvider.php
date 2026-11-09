<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
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
        Paginator::useTailwind();

        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        if ($appUrl = config('app.url')) {
            URL::forceRootUrl($appUrl);
        }

        View::composer('web.partials.partners', function ($view) {
            $partnerLogos = collect(glob(public_path('images/logo/*')) ?: [])
                ->filter(fn ($path) => preg_match('/\.(png|jpe?g|svg|webp)$/i', $path))
                ->sort()
                ->map(fn ($path) => 'images/logo/' . basename($path))
                ->values();

            $view->with('partnerLogos', $partnerLogos);
        });
    }
}

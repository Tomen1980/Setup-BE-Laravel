<?php

namespace App\Providers;

use App\Interface\Repositories\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Dedoc\Scramble\Scramble;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Scramble::configure()->routes(function (Route $route) {
            return Str::startsWith($route->uri, 'api/');
        });
    }
}

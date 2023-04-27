<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;
use Hashids\Hashids;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Passport::hashClientSecrets();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}

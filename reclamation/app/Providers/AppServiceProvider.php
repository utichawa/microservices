<?php

namespace App\Providers;

use Eureka\EurekaClient;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);

        try {
            // $client = new EurekaClient(config('eureuka.server'));

            // $client->register();
        } catch (Exception $e) {
            Log::info('Failed to connect to EUREUKA');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

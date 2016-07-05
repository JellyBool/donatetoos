<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BillingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //\Pingpp\Pingpp::setPrivateKeyPath(config_path().'/key/private.pem');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Billing\BillingInterface','App\Billing\PingBilling');
    }
}

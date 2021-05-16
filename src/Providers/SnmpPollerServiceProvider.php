<?php

namespace Acamposm\SnmpPoller\Providers;

use Acamposm\SnmpPoller\Console\Commands\InstallSnmpPackageCommand;
use Acamposm\SnmpPoller\Facades\SnmpPoller;
use Illuminate\Support\ServiceProvider;

class SnmpPollerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('snmp.php'),
            ], 'config');

            // Registering package commands.
            $this->commands([
                InstallSnmpPackageCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind('snmp-poller', function ($app) {
            return new SnmpPoller();
        });
    }
}

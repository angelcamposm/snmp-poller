<?php

namespace Acamposm\SnmpPoller\Providers;

use Acamposm\SnmpPoller\Console\Commands\InstallSnmpPackageCommand;
use Acamposm\SnmpPoller\Console\Commands\MakeCustomPollerCommand;
use Acamposm\SnmpPoller\Console\Commands\MakeSnmpPollerCommand;
use Acamposm\SnmpPoller\Facades\SnmpPoller;
use Illuminate\Support\ServiceProvider;

class SnmpPollerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishConfig();
        $this->publishMigrations();
        $this->registerCommands();
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

    /**
     * Register commands for the package.
     *
     * @return void
     */
    private function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallSnmpPackageCommand::class,
                MakeSnmpPollerCommand::class,
            ]);
        }

        $this->commands([
            MakeCustomPollerCommand::class,
        ]);
    }

    /**
     * Publish config file for the package.
     *
     * @return void
     */
    private function publishConfig()
    {
        $this->publishes([
            __DIR__.'/../../config/config.php' => config_path('snmp.php'),
        ], 'config');
    }

    /**
     * Publish migrations files for the package.
     *
     * @return void
     */
    private function publishMigrations(): void
    {
        $this->publishes([
            __DIR__ . '/../../database/migrations' => database_path('migrations'),
        ], 'migrations');
    }
}

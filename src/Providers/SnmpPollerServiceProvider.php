<?php

namespace Acamposm\SnmpPoller\Providers;

use Acamposm\SnmpPoller\Facades\SnmpPoller;
use Illuminate\Support\ServiceProvider;

class SnmpPollerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind('snmp-poller', function ($app) {
            return new SnmpPoller();
        });
    }
}

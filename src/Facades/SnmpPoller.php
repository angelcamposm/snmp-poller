<?php

namespace Acamposm\SnmpPoller\Facades;

use Illuminate\Support\Facades\Facade;

class SnmpPoller extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'snmp-poller';
    }
}

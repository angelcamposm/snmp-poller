<?php

namespace Acamposm\SnmpPoller;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Acamposm\SnmpPoller\Skeleton\SkeletonClass
 */
class SnmpPollerFacade extends Facade
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

<?php

namespace Acamposm\SnmpPoller\Pollers;

final class IpNetToMediaTablePoller extends SnmpBasePoller
{
    /**
     * Specifies if the OIDs contained in $oids are table fields or leaves.
     *
     * @var bool
     */
    protected bool $is_table = true;

    /**
     * Name of the SNMP Table.
     *
     * @var string
     */
    protected string $table = 'ipNetToMediaTable';

    /**
     * SNMP OIDs to be queried.
     *
     * @var array
     */
    protected array $oids = [
        'ipNetToMediaIfIndex'     => '.1.3.6.1.2.1.4.22.1.1',
        'ipNetToMediaPhysAddress' => '.1.3.6.1.2.1.4.22.1.2',
        'ipNetToMediaNetAddress'  => '.1.3.6.1.2.1.4.22.1.3',
        'ipNetToMediaType'        => '.1.3.6.1.2.1.4.22.1.4',
    ];
}

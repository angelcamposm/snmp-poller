<?php

namespace Acamposm\SnmpPoller\Pollers;

final class Dot1dBasePortTablePoller extends SnmpBasePoller
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
    protected string $table = 'dot1dBasePortTable';

    /**
     * SNMP OIDs to be queried.
     *
     * @var array
     */
    protected array $oids = [
        'dot1dBasePort'                      => '.1.3.6.1.2.1.17.1.4.1.1',
        'dot1dBasePortIfIndex'               => '.1.3.6.1.2.1.17.1.4.1.2',
        'dot1dBasePortCircuit'               => '.1.3.6.1.2.1.17.1.4.1.3',
        'dot1dBasePortDelayExceededDiscards' => '.1.3.6.1.2.1.17.1.4.1.4',
        'dot1dBasePortMtuExceededDiscards'   => '.1.3.6.1.2.1.17.1.4.1.4',
    ];
}

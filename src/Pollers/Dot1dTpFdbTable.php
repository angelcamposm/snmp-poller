<?php

namespace Acamposm\SnmpPoller\Pollers;

final class Dot1dTpFdbTable extends SnmpBasePoller
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
    protected string $table = 'dot1dTpFdbTable';

    /**
     * SNMP OIDs to be queried.
     *
     * @var array
     */
    protected array $oids = [
        'dot1dTpFdbAddress' => '.1.3.6.1.2.1.17.4.3.1.1',
        'dot1dTpFdbPort'    => '.1.3.6.1.2.1.17.4.3.1.2',
        'dot1dTpFdbStatus'  => '.1.3.6.1.2.1.17.4.3.1.3',
    ];
}
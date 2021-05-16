<?php

namespace Acamposm\SnmpPoller\Pollers;

final class IfTablePoller extends SnmpBasePoller
{
    /**
     * Specifies if the OIDs contained in $oids are table fields or leaves.
     *
     * @var bool
     */
    protected bool $is_table = true;

    /**
     * Name of the SNMP Table
     *
     * @var  string
     */
    protected string $table = 'ifTable';

    /**
     * SNMP OIDs to be queried.
     *
     * @var array
     */
    protected array $oids = [
        'ifIndex'           => '.1.3.6.1.2.1.2.2.1.1',
        'ifDescr'           => '.1.3.6.1.2.1.2.2.1.2',
        'ifType'            => '.1.3.6.1.2.1.2.2.1.3',
        'ifMtu'             => '.1.3.6.1.2.1.2.2.1.4',
        'ifSpeed'           => '.1.3.6.1.2.1.2.2.1.5',
        'ifPhysAddress'     => '.1.3.6.1.2.1.2.2.1.6',
        'ifAdminStatus'     => '.1.3.6.1.2.1.2.2.1.7',
        'ifOperStatus'      => '.1.3.6.1.2.1.2.2.1.8',
        'ifLastChange'      => '.1.3.6.1.2.1.2.2.1.9',
        'ifInOctets'        => '.1.3.6.1.2.1.2.2.1.10',
        'ifInUcastPkts'     => '.1.3.6.1.2.1.2.2.1.11',
        'ifInDiscards'      => '.1.3.6.1.2.1.2.2.1.13',
        'ifInErrors'        => '.1.3.6.1.2.1.2.2.1.14',
        'ifInUnknownProtos' => '.1.3.6.1.2.1.2.2.1.15',
        'ifOutOctets'       => '.1.3.6.1.2.1.2.2.1.16',
        'ifOutUcastPkts'    => '.1.3.6.1.2.1.2.2.1.17',
        'ifOutDiscards'     => '.1.3.6.1.2.1.2.2.1.19',
        'ifOutErrors'       => '.1.3.6.1.2.1.2.2.1.20',
    ];
}
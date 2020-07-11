<?php

namespace Acamposm\SnmpPoller\Pollers;

use Acamposm\SnmpPoller\SnmpPoller;

class InterfacesExtendedTablePoller extends SnmpPoller
{
    /**
     * Returns the results of the snmp query as table
     *
     * @var boolean
     */
    protected bool $is_table = true;

    /**
     * OIDs from ifXTable from IF-MIB file.
     *
     * @var array
     */
    protected array $oids = [
        'ifName' => '.1.3.6.1.2.1.31.1.1.1.1',
        //'ifInMulticastPkts'          => '.1.3.6.1.2.1.31.1.1.1.2',
        //'ifInBroadcastPkts'          => '.1.3.6.1.2.1.31.1.1.1.3',
        //'ifOutMulticastPkts'         => '.1.3.6.1.2.1.31.1.1.1.4',
        //'ifOutBroadcastPkts'         => '.1.3.6.1.2.1.31.1.1.1.5',
        'ifHCInOctets' => '.1.3.6.1.2.1.31.1.1.1.6',
        //'ifHCInUcastPkts'            => '.1.3.6.1.2.1.31.1.1.1.7',
        //'ifHCInMulticastPkts'        => '.1.3.6.1.2.1.31.1.1.1.8',
        //'ifHCInBroadcastPkts'        => '.1.3.6.1.2.1.31.1.1.1.9',
        'ifHCOutOctets' => '.1.3.6.1.2.1.31.1.1.1.10',
        //'ifHCOutUcastPkts'           => '.1.3.6.1.2.1.31.1.1.1.11',
        //'ifHCOutMulticastPkts'       => '.1.3.6.1.2.1.31.1.1.1.12',
        //'ifHCOutBroadcastPkts'       => '.1.3.6.1.2.1.31.1.1.1.13',
        'ifLinkUpDownTrapEnable' => '.1.3.6.1.2.1.31.1.1.1.14',
        'ifHighSpeed' => '.1.3.6.1.2.1.31.1.1.1.15',
        'ifPromiscuousMode' => '.1.3.6.1.2.1.31.1.1.1.16',
        'ifConnectorPresent' => '.1.3.6.1.2.1.31.1.1.1.17',
        'ifAlias' => '.1.3.6.1.2.1.31.1.1.1.18',
        'ifCounterDiscontinuityTime' => '.1.3.6.1.2.1.31.1.1.1.19',
    ];

    /**
     * Name of the SNMP Table
     *
     * @var string
     */
    protected string $table = 'ifXTable';
}

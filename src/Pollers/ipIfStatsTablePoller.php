<?php

namespace Acamposm\SnmpPoller\Pollers;

use Acamposm\SnmpPoller\SnmpPoller;

final class ipIfStatsTablePoller extends SnmpPoller
{
    /**
     * Returns the results of the snmp query as table
     *
     * @var bool
     */
    protected bool $is_table = true;

    /**
     * Indexes of the table
     *
     * @var  array
     */
    protected array $indexes = [
        'ipIfStatsIPVersion',
        'ipIfStatsIfIndex',
    ];

    /**
     * Index of the table ipSystemStatsTablePoller
     *
     * @var  array
     */
    protected array $ipIfStatsIPVersion = [
    	0 => 'unknown',
    	1 => 'IPv4',
    	2 => 'IPv6',
    ];

    /**
     * SNMP OIDs from EntPhysical Table
     *
     * @var  array
     */
    protected array $oids = [
        //'ipIfStatsIPVersion' => '.1.3.6.1.2.1.4.31.3.1.1',
        //'ipIfStatsIfIndex' => '.1.3.6.1.2.1.4.31.3.1.2',
        'ipIfStatsInReceives' => '.1.3.6.1.2.1.4.31.3.1.3',
        'ipIfStatsHCInReceives' => '.1.3.6.1.2.1.4.31.3.1.4',
        'ipIfStatsInOctets' => '.1.3.6.1.2.1.4.31.3.1.5',
        'ipIfStatsHCInOctets' => '.1.3.6.1.2.1.4.31.3.1.6',
        'ipIfStatsInHdrErrors' => '.1.3.6.1.2.1.4.31.3.1.7',
        'ipIfStatsInNoRoutes' => '.1.3.6.1.2.1.4.31.3.1.8',
        'ipIfStatsInAddrErrors' => '.1.3.6.1.2.1.4.31.3.1.9',
        'ipIfStatsInUnknownProtos' => '.1.3.6.1.2.1.4.31.3.1.10',
        'ipIfStatsInTruncatedPkts' => '.1.3.6.1.2.1.4.31.3.1.11',
        'ipIfStatsInForwDatagrams' => '.1.3.6.1.2.1.4.31.3.1.12',
        'ipIfStatsHCInForwDatagrams' => '.1.3.6.1.2.1.4.31.3.1.13',
        'ipIfStatsReasmReqds' => '.1.3.6.1.2.1.4.31.3.1.14',
        'ipIfStatsReasmOKs' => '.1.3.6.1.2.1.4.31.3.1.15',
        'ipIfStatsReasmFails' => '.1.3.6.1.2.1.4.31.3.1.16',
        'ipIfStatsInDiscards' => '.1.3.6.1.2.1.4.31.3.1.17',
        'ipIfStatsInDelivers' => '.1.3.6.1.2.1.4.31.3.1.18',
        'ipIfStatsHCInDelivers' => '.1.3.6.1.2.1.4.31.3.1.19',
        'ipIfStatsOutRequests' => '.1.3.6.1.2.1.4.31.3.1.20',
        'ipIfStatsHCOutRequests' => '.1.3.6.1.2.1.4.31.3.1.21',
        'ipIfStatsOutForwDatagrams' => '.1.3.6.1.2.1.4.31.3.1.23',
        'ipIfStatsHCOutForwDatagrams' => '.1.3.6.1.2.1.4.31.3.1.24',
        'ipIfStatsOutDiscards' => '.1.3.6.1.2.1.4.31.3.1.25',
        'ipIfStatsOutFragReqds' => '.1.3.6.1.2.1.4.31.3.1.26',
        'ipIfStatsOutFragOKs' => '.1.3.6.1.2.1.4.31.3.1.27',
        'ipIfStatsOutFragFails' => '.1.3.6.1.2.1.4.31.3.1.28',
        'ipIfStatsOutFragCreates' => '.1.3.6.1.2.1.4.31.3.1.29',
        'ipIfStatsOutTransmits' => '.1.3.6.1.2.1.4.31.3.1.30',
        'ipIfStatsHCOutTransmits' => '.1.3.6.1.2.1.4.31.3.1.31',
        'ipIfStatsOutOctets' => '.1.3.6.1.2.1.4.31.3.1.32',
        'ipIfStatsHCOutOctets' => '.1.3.6.1.2.1.4.31.3.1.33',
        'ipIfStatsInMcastPkts' => '.1.3.6.1.2.1.4.31.3.1.34',
        'ipIfStatsHCInMcastPkts' => '.1.3.6.1.2.1.4.31.3.1.35',
        'ipIfStatsInMcastOctets' => '.1.3.6.1.2.1.4.31.3.1.36',
        'ipIfStatsHCInMcastOctets' => '.1.3.6.1.2.1.4.31.3.1.37',
        'ipIfStatsOutMcastPkts' => '.1.3.6.1.2.1.4.31.3.1.38',
        'ipIfStatsHCOutMcastPkts' => '.1.3.6.1.2.1.4.31.3.1.39',
        'ipIfStatsOutMcastOctets' => '.1.3.6.1.2.1.4.31.3.1.40',
        'ipIfStatsHCOutMcastOctets' => '.1.3.6.1.2.1.4.31.3.1.41',
        'ipIfStatsInBcastPkts' => '.1.3.6.1.2.1.4.31.3.1.42',
        'ipIfStatsHCInBcastPkts' => '.1.3.6.1.2.1.4.31.3.1.43',
        'ipIfStatsOutBcastPkts' => '.1.3.6.1.2.1.4.31.3.1.44',
        'ipIfStatsHCOutBcastPkts' => '.1.3.6.1.2.1.4.31.3.1.45',
        'ipIfStatsDiscontinuityTime' => '.1.3.6.1.2.1.4.31.3.1.46',
        'ipIfStatsRefreshRate' => '.1.3.6.1.2.1.4.31.3.1.47',
    ];

    /**
     * Name of the SNMP Table
     *
     * @var  string
     */
    protected string $table = 'ipIfStatsTable';
}















































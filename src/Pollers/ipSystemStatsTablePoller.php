<?php

namespace Acamposm\SnmpPoller\Pollers;

use Acamposm\SnmpPoller\SnmpPoller;

final class ipSystemStatsTablePoller extends SnmpPoller
{
    /**
     * Returns the results of the snmp query as table
     *
     * @var bool
     */
    protected bool $is_table = true;

    /**
     * Index of the table ipSystemStatsTablePoller
     *
     * @var  array
     */
    protected array $index = [
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
		//'ipSystemStatsIPVersion' => '.1.3.6.1.2.1.4.31.1.1.1',
		'ipSystemStatsInReceives' => '.1.3.6.1.2.1.4.31.1.1.3',
		'ipSystemStatsHCInReceives' => '.1.3.6.1.2.1.4.31.1.1.4',
		'ipSystemStatsInOctets' => '.1.3.6.1.2.1.4.31.1.1.5',
		'ipSystemStatsHCInOctets' => '.1.3.6.1.2.1.4.31.1.1.6',
		'ipSystemStatsInHdrErrors' => '.1.3.6.1.2.1.4.31.1.1.7',
		'ipSystemStatsInNoRoutes' => '.1.3.6.1.2.1.4.31.1.1.8',
		'ipSystemStatsInAddrErrors' => '.1.3.6.1.2.1.4.31.1.1.9',
		'ipSystemStatsInUnknownProtos' => '.1.3.6.1.2.1.4.31.1.1.10',
		'ipSystemStatsInTruncatedPkts' => '.1.3.6.1.2.1.4.31.1.1.11',
		'ipSystemStatsInForwDatagrams' => '.1.3.6.1.2.1.4.31.1.1.12',
		'ipSystemStatsHCInForwDatagrams' => '.1.3.6.1.2.1.4.31.1.1.13',
		'ipSystemStatsReasmReqds' => '.1.3.6.1.2.1.4.31.1.1.14',
		'ipSystemStatsReasmOKs' => '.1.3.6.1.2.1.4.31.1.1.15',
		'ipSystemStatsReasmFails' => '.1.3.6.1.2.1.4.31.1.1.16',
		'ipSystemStatsInDiscards' => '.1.3.6.1.2.1.4.31.1.1.17',
		'ipSystemStatsInDelivers' => '.1.3.6.1.2.1.4.31.1.1.18',
		'ipSystemStatsHCInDelivers' => '.1.3.6.1.2.1.4.31.1.1.19',
		'ipSystemStatsOutRequests' => '.1.3.6.1.2.1.4.31.1.1.20',
		'ipSystemStatsHCOutRequests' => '.1.3.6.1.2.1.4.31.1.1.21',
		'ipSystemStatsOutNoRoutes' => '.1.3.6.1.2.1.4.31.1.1.22',
		'ipSystemStatsOutForwDatagrams' => '.1.3.6.1.2.1.4.31.1.1.23',
		'ipSystemStatsHCOutForwDatagrams' => '.1.3.6.1.2.1.4.31.1.1.24',
		'ipSystemStatsOutDiscards' => '.1.3.6.1.2.1.4.31.1.1.25',
		'ipSystemStatsOutFragReqds' => '.1.3.6.1.2.1.4.31.1.1.26',
		'ipSystemStatsOutFragOKs' => '.1.3.6.1.2.1.4.31.1.1.27',
		'ipSystemStatsOutFragFails' => '.1.3.6.1.2.1.4.31.1.1.28',
		'ipSystemStatsOutFragCreates' => '.1.3.6.1.2.1.4.31.1.1.29',
		'ipSystemStatsOutTransmits' => '.1.3.6.1.2.1.4.31.1.1.30',
		'ipSystemStatsHCOutTransmits' => '.1.3.6.1.2.1.4.31.1.1.31',
		'ipSystemStatsOutOctets' => '.1.3.6.1.2.1.4.31.1.1.32',
		'ipSystemStatsHCOutOctets' => '.1.3.6.1.2.1.4.31.1.1.33',
		'ipSystemStatsInMcastPkts' => '.1.3.6.1.2.1.4.31.1.1.34',
		'ipSystemStatsHCInMcastPkts' => '.1.3.6.1.2.1.4.31.1.1.35',
		'ipSystemStatsInMcastOctets' => '.1.3.6.1.2.1.4.31.1.1.36',
		'ipSystemStatsHCInMcastOctets' => '.1.3.6.1.2.1.4.31.1.1.37',
		'ipSystemStatsOutMcastPkts' => '.1.3.6.1.2.1.4.31.1.1.38',
		'ipSystemStatsHCOutMcastPkts' => '.1.3.6.1.2.1.4.31.1.1.39',
		'ipSystemStatsOutMcastOctets' => '.1.3.6.1.2.1.4.31.1.1.40',
		'ipSystemStatsHCOutMcastOctets' => '.1.3.6.1.2.1.4.31.1.1.41',
		'ipSystemStatsInBcastPkts' => '.1.3.6.1.2.1.4.31.1.1.42',
		'ipSystemStatsHCInBcastPkts' => '.1.3.6.1.2.1.4.31.1.1.43',
		'ipSystemStatsOutBcastPkts' => '.1.3.6.1.2.1.4.31.1.1.44',
		'ipSystemStatsHCOutBcastPkts' => '.1.3.6.1.2.1.4.31.1.1.45',
		'ipSystemStatsDiscontinuityTime' => '.1.3.6.1.2.1.4.31.1.1.46',
		'ipSystemStatsRefreshRate' => '.1.3.6.1.2.1.4.31.1.1.47',
	];

    /**
     * Name of the SNMP Table
     *
     * @var  string
     */
    protected string $table = 'ipSystemStatsTable';
}
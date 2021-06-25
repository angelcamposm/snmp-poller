<?php

namespace Acamposm\SnmpPoller\Pollers;

final class IpRouteTablePoller extends SnmpBasePoller
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
    protected string $table = 'ipRouteTable';

    protected array $ipRouteProto = [
        1 => 'other',
        2 => 'invalid',
        3 => 'direct',
        4 => 'indirect',
    ];

    protected array $ipRouteType = [
        1  => 'other',
        2  => 'local',
        3  => 'netmgmt',
        4  => 'icmp',
        5  => 'egp',
        6  => 'ggp',
        7  => 'hello',
        8  => 'rip',
        9  => 'is-is',
        10 => 'es-is',
        11 => 'ciscoIgrp',
        12 => 'bbnSpfIgp',
        13 => 'ospf',
        14 => 'bgp',
    ];

    /**
     * SNMP OIDs to be queried.
     *
     * @var array
     */
    protected array $oids = [
        'ipRouteDest'    => '.1.3.6.1.2.1.4.21.1.1',
        'ipRouteIfIndex' => '.1.3.6.1.2.1.4.21.1.2',
        'ipRouteMetric1' => '.1.3.6.1.2.1.4.21.1.3',
        'ipRouteMetric2' => '.1.3.6.1.2.1.4.21.1.4',
        'ipRouteMetric3' => '.1.3.6.1.2.1.4.21.1.5',
        'ipRouteMetric4' => '.1.3.6.1.2.1.4.21.1.6',
        'ipRouteNextHop' => '.1.3.6.1.2.1.4.21.1.7',
        'ipRouteType'    => '.1.3.6.1.2.1.4.21.1.8',
        'ipRouteProto'   => '.1.3.6.1.2.1.4.21.1.9',
        'ipRouteAge'     => '.1.3.6.1.2.1.4.21.1.10',
        'ipRouteMask'    => '.1.3.6.1.2.1.4.21.1.11',
        'ipRouteMetric5' => '.1.3.6.1.2.1.4.21.1.12',
        'ipRouteInfo'    => '.1.3.6.1.2.1.4.21.1.13',
    ];
}

<?php

namespace Acamposm\SnmpPoller\Pollers;;

use Acamposm\SnmpPoller\SnmpPoller;

class SnmpDiscoveryPoller extends SnmpPoller
{
	/**
	 * Returns the results of the snmp query as table
	 *
	 * @var  boolean
	 */
	protected bool $is_table = false;

	/**
	 * SNMPv2-MIB system
	 *
	 * @var  array
	 */
	protected array $oids = [
        'sysDescr'        => '.1.3.6.1.2.1.1.1.0',
        'sysObjectID'     => '.1.3.6.1.2.1.1.2.0',
        'sysUpTime'       => '.1.3.6.1.2.1.1.3.0',
        'sysContact'      => '.1.3.6.1.2.1.1.4.0',
        'sysName'         => '.1.3.6.1.2.1.1.5.0',
        'sysLocation'     => '.1.3.6.1.2.1.1.6.0',
        'sysServices'     => '.1.3.6.1.2.1.1.7.0',
        'sysORLastChange' => '.1.3.6.1.2.1.1.8.0',
	];

	/**
	 * Name of the SNMP Table
	 *
	 * @var  string
	 */
	protected string $table = 'discovery';
}
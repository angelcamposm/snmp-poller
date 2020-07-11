<?php

namespace Acamposm\SnmpPoller\Pollers;

use Acamposm\SnmpPoller\SnmpPoller;
use Acamposm\SnmpPoller\Parsers\SnmpTypeParser;

class IpAddrTablePoller extends SnmpPoller
{
	/**
	 * Returns the results of the snmp query as table
	 *
	 * @var  boolean
	 */
	protected bool $is_table = true;

	/**
	 * SNMP OIDs from IpAddressTable Table
	 *
	 * @var  array
	 */
	protected array $oids = [
		'ipAdEntAddr'         => '.1.3.6.1.2.1.4.20.1.1',
		'ipAdEntIfIndex'      => '.1.3.6.1.2.1.4.20.1.2',
		'ipAdEntNetMask'      => '.1.3.6.1.2.1.4.20.1.3',
		'ipAdEntBcastAddr'    => '.1.3.6.1.2.1.4.20.1.4',
		'ipAdEntReasmMaxSize' => '.1.3.6.1.2.1.4.20.1.5',
	];

	/**
	 * Name of the SNMP Table
	 *
	 * @var  string
	 */
	protected string $table = 'ipAddressTable';
}
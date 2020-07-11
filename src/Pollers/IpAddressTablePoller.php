<?php

namespace Acamposm\SnmpPoller\Pollers;

use Acamposm\SnmpPoller\SnmpPoller;
use Acamposm\SnmpPoller\Parsers\SnmpTypeParser;

class IpAddressTablePoller extends SnmpPoller
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
		'ipAddressAddrType'    => '.1.3.6.1.2.1.4.34.1.1',
		'ipAddressAddr'        => '.1.3.6.1.2.1.4.34.1.2',
		'ipAddressIfIndex'     => '.1.3.6.1.2.1.4.34.1.3',
		'ipAddressType'        => '.1.3.6.1.2.1.4.34.1.4',
		'ipAddressPrefix'      => '.1.3.6.1.2.1.4.34.1.5',
		'ipAddressOrigin'      => '.1.3.6.1.2.1.4.34.1.6',
		'ipAddressStatus'      => '.1.3.6.1.2.1.4.34.1.7',
		'ipAddressCreated'     => '.1.3.6.1.2.1.4.34.1.8',
		'ipAddressLastChanged' => '.1.3.6.1.2.1.4.34.1.9',
		'ipAddressRowStatus'   => '.1.3.6.1.2.1.4.34.1.10',
		'ipAddressStorageType' => '.1.3.6.1.2.1.4.34.1.11',
	];

	/**
	 * Name of the SNMP Table
	 *
	 * @var  string
	 */
	protected string $table = 'ipAddressTable';
}
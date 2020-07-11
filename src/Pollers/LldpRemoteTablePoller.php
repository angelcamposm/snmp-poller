<?php

namespace Acamposm\SnmpPoller\Pollers;

use Acamposm\SnmpPoller\SnmpPoller;

class LldpRemoteTablePoller extends SnmpPoller
{
	/**
	 * Returns the results of the snmp query as table
	 *
	 * @var  boolean
	 */
	protected bool $is_table = true;
	
    protected array $oids = [
        //'lldpRemTimeMark'         => '.1.0.8802.1.1.2.1.4.1.1.1', // Index
        //'lldpRemLocalPortNum'     => '.1.0.8802.1.1.2.1.4.1.1.2', // Index
        //'lldpRemIndex'            => '.1.0.8802.1.1.2.1.4.1.1.3', // Index
        'lldpRemChassisIdSubtype' => '.1.0.8802.1.1.2.1.4.1.1.4',
        'lldpRemChassisId'        => '.1.0.8802.1.1.2.1.4.1.1.5',
        'lldpRemPortIdSubtype'    => '.1.0.8802.1.1.2.1.4.1.1.6',
        'lldpRemPortId'           => '.1.0.8802.1.1.2.1.4.1.1.7',
        'lldpRemPortDesc'         => '.1.0.8802.1.1.2.1.4.1.1.8',
        'lldpRemSysName'          => '.1.0.8802.1.1.2.1.4.1.1.9',
        'lldpRemSysDesc'          => '.1.0.8802.1.1.2.1.4.1.1.10',
        'lldpRemSysCapSupported'  => '.1.0.8802.1.1.2.1.4.1.1.11',
        'lldpRemSysCapEnabled'    => '.1.0.8802.1.1.2.1.4.1.1.12',
    ];

	/**
	 * Name of the SNMP Table
	 *
	 * @var  string
	 */
	protected string $table = 'lldpRemTable';
}
<?php

namespace Acamposm\SnmpPoller\Pollers;

use Acamposm\SnmpPoller\SnmpPoller;

class LinkAggTablePoller extends SnmpPoller
{
	/**
	 * Returns the results of the snmp query as table
	 *
	 * @var  boolean
	 */
	protected bool $is_table = true;

	/**
	 * SNMP OIDs from EntPhysical Table
	 *
	 * @var  array
	 */
	protected array $oids = [
		//'dot3adAggPortIndex'                      => '.1.2.840.10006.300.43.1.2.1.1.1',
		//'dot3adAggPortActorSystemPriority'        => '.1.2.840.10006.300.43.1.2.1.1.2',
		//'dot3adAggPortActorSystemID'              => '.1.2.840.10006.300.43.1.2.1.1.3',
		'dot3adAggPortActorAdminKey'              => '.1.2.840.10006.300.43.1.2.1.1.4',
		'dot3adAggPortActorOperKey'               => '.1.2.840.10006.300.43.1.2.1.1.5',
		//'dot3adAggPortPartnerAdminSystemPriority' => '.1.2.840.10006.300.43.1.2.1.1.6',
		//'dot3adAggPortPartnerOperSystemPriority'  => '.1.2.840.10006.300.43.1.2.1.1.7',
		//'dot3adAggPortPartnerAdminSystemID'       => '.1.2.840.10006.300.43.1.2.1.1.8',
		//'dot3adAggPortPartnerOperSystemID'        => '.1.2.840.10006.300.43.1.2.1.1.9',
		//'dot3adAggPortPartnerAdminKey'            => '.1.2.840.10006.300.43.1.2.1.1.10',
		//'dot3adAggPortPartnerOperKey'             => '.1.2.840.10006.300.43.1.2.1.1.11',
		//'dot3adAggPortSelectedAggID'              => '.1.2.840.10006.300.43.1.2.1.1.12',
		//'dot3adAggPortAttachedAggID'              => '.1.2.840.10006.300.43.1.2.1.1.13',
		'dot3adAggPortActorPort'                  => '.1.2.840.10006.300.43.1.2.1.1.14',
		'dot3adAggPortActorPortPriority'          => '.1.2.840.10006.300.43.1.2.1.1.15',
		//'dot3adAggPortPartnerAdminPort'           => '.1.2.840.10006.300.43.1.2.1.1.16',
		//'dot3adAggPortPartnerOperPort'            => '.1.2.840.10006.300.43.1.2.1.1.17',
		//'dot3adAggPortPartnerAdminPortPriority'   => '.1.2.840.10006.300.43.1.2.1.1.18',
		//'dot3adAggPortPartnerOperPortPriority'    => '.1.2.840.10006.300.43.1.2.1.1.19',
		//'dot3adAggPortActorAdminState'            => '.1.2.840.10006.300.43.1.2.1.1.20',
		//'dot3adAggPortActorOperState'             => '.1.2.840.10006.300.43.1.2.1.1.21',
		//'dot3adAggPortPartnerAdminState'          => '.1.2.840.10006.300.43.1.2.1.1.22',
		//'dot3adAggPortPartnerOperState'           => '.1.2.840.10006.300.43.1.2.1.1.23',
		//'dot3adAggPortAggregateOrIndividual'      => '.1.2.840.10006.300.43.1.2.1.1.24',
	];

	/**
	 * Name of the SNMP Table
	 *
	 * @var  string
	 */
	protected string $table = 'dot3adAggPortTable';
}
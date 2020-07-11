<?php

namespace Acamposm\SnmpPoller\Pollers;

use Acamposm\SnmpPoller\SnmpPoller;

final class EntityPhysicalTablePoller extends SnmpPoller
{
    /**
     * Returns the results of the snmp query as table
     *
     * @var bool
     */
    protected bool $is_table = true;

    /**
     * SNMP OIDs from EntPhysical Table
     *
     * @var  array
     */
    protected array $oids = [
        'entPhysicalIndex' => '.1.3.6.1.2.1.47.1.1.1.1.1',
        'entPhysicalDescr' => '.1.3.6.1.2.1.47.1.1.1.1.2',
        'entPhysicalVendorType' => '.1.3.6.1.2.1.47.1.1.1.1.3',
        'entPhysicalContainedIn' => '.1.3.6.1.2.1.47.1.1.1.1.4',
        'entPhysicalClass' => '.1.3.6.1.2.1.47.1.1.1.1.5',
        'entPhysicalParentRelPos' => '.1.3.6.1.2.1.47.1.1.1.1.6',
        'entPhysicalName' => '.1.3.6.1.2.1.47.1.1.1.1.7',
        'entPhysicalHardwareRev' => '.1.3.6.1.2.1.47.1.1.1.1.8',
        'entPhysicalFirmwareRev' => '.1.3.6.1.2.1.47.1.1.1.1.9',
        'entPhysicalSoftwareRev' => '.1.3.6.1.2.1.47.1.1.1.1.10',
        'entPhysicalSerialNum' => '.1.3.6.1.2.1.47.1.1.1.1.11',
        'entPhysicalMfgName' => '.1.3.6.1.2.1.47.1.1.1.1.12',
        'entPhysicalModelName' => '.1.3.6.1.2.1.47.1.1.1.1.13',
        'entPhysicalAlias' => '.1.3.6.1.2.1.47.1.1.1.1.14',
        'entPhysicalAssetID' => '.1.3.6.1.2.1.47.1.1.1.1.15',
        'entPhysicalIsFRU' => '.1.3.6.1.2.1.47.1.1.1.1.16',
    ];

    /**
     * Name of the SNMP Table
     *
     * @var  string
     */
    protected string $table = 'entityPhysicalTable';
}

<?php

namespace Acamposm\SnmpPoller\Pollers;

final class HrStorageTablePoller extends SnmpBasePoller
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
    protected string $table = 'hrStorageTable';

    protected array $mappings = [
        'hrStorageType' => [
            '.1.3.6.1.2.1.25.2.1.1'  => 'hrStorageOther',
            '.1.3.6.1.2.1.25.2.1.2'  => 'hrStorageRam',
            '.1.3.6.1.2.1.25.2.1.3'  => 'hrStorageVirtualMemory',
            '.1.3.6.1.2.1.25.2.1.4'  => 'hrStorageFixedDisk',
            '.1.3.6.1.2.1.25.2.1.5'  => 'hrStorageRemovableDisk',
            '.1.3.6.1.2.1.25.2.1.6'  => 'hrStorageFloppyDisk',
            '.1.3.6.1.2.1.25.2.1.7'  => 'hrStorageCompactDisk',
            '.1.3.6.1.2.1.25.2.1.8'  => 'hrStorageRamDisk',
            '.1.3.6.1.2.1.25.2.1.9'  => 'hrStorageFlashMemory',
            '.1.3.6.1.2.1.25.2.1.10' => 'hrStorageNetworkDisk',
        ],
    ];

    /**
     * SNMP OIDs to be queried.
     *
     * @var array
     */
    protected array $oids = [
        'hrStorageIndex'              => '.1.3.6.1.2.1.25.2.3.1.1',
        'hrStorageType'               => '.1.3.6.1.2.1.25.2.3.1.2',
        'hrStorageDesc'               => '.1.3.6.1.2.1.25.2.3.1.3',
        // 'hrStorageAllocationUnits'    => '.1.3.6.1.2.1.25.2.3.1.4',
        'hrStorageSize'               => '.1.3.6.1.2.1.25.2.3.1.5',
        'hrStorageUsed'               => '.1.3.6.1.2.1.25.2.3.1.6',
        // 'hrStorageAllocationFailures' => '.1.3.6.1.2.1.25.2.3.1.7',
    ];
}

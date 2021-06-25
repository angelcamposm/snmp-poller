<?php

namespace Acamposm\SnmpPoller\Pollers;

final class HrDeviceTablePoller extends SnmpBasePoller
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
    protected string $table = 'hrDeviceTable';

    protected array $mappings = [
        'hrStorageType' => [
            '.1.3.6.1.2.1.25.3.1.1'  => 'Other',
            '.1.3.6.1.2.1.25.3.1.2'  => 'Unknown',
            '.1.3.6.1.2.1.25.3.1.3'  => 'Processor',
            '.1.3.6.1.2.1.25.3.1.4'  => 'Network',
            '.1.3.6.1.2.1.25.3.1.5'  => 'Printer',
            '.1.3.6.1.2.1.25.3.1.6'  => 'Disk Storage',
            '.1.3.6.1.2.1.25.3.1.10' => 'Video',
            '.1.3.6.1.2.1.25.3.1.11' => 'Audio',
            '.1.3.6.1.2.1.25.3.1.12' => 'Coprocessor',
            '.1.3.6.1.2.1.25.3.1.13' => 'Keyboard',
            '.1.3.6.1.2.1.25.3.1.14' => 'Modem',
            '.1.3.6.1.2.1.25.3.1.15' => 'Parallel Port',
            '.1.3.6.1.2.1.25.3.1.16' => 'Pointing',
            '.1.3.6.1.2.1.25.3.1.17' => 'Serial Port',
            '.1.3.6.1.2.1.25.3.1.18' => 'Tape',
            '.1.3.6.1.2.1.25.3.1.19' => 'Clock',
            '.1.3.6.1.2.1.25.3.1.20' => 'Volatile Memory',
            '.1.3.6.1.2.1.25.3.1.21' => 'Non Volatile Memory',
        ],
        'hrDeviceStatus' => [
            1 => 'unknown',
            2 => 'running',
            3 => 'warning',
            4 => 'testing',
            5 => 'down',
        ],
    ];

    /**
     * SNMP OIDs to be queried.
     *
     * @var array
     */
    protected array $oids = [
        'hrDeviceIndex'  => '.1.3.6.1.2.1.25.3.2.1.1',
        'hrDeviceType'   => '.1.3.6.1.2.1.25.3.2.1.2',
        'hrDeviceDescr'  => '.1.3.6.1.2.1.25.3.2.1.3',
        'hrDeviceID'     => '.1.3.6.1.2.1.25.3.2.1.4',
        'hrDeviceStatus' => '.1.3.6.1.2.1.25.3.2.1.5',
//        'hrDeviceErrors' => '.1.3.6.1.2.1.25.3.2.1.6',
    ];
}

<?php

namespace Acamposm\SnmpPoller\Pollers;

final class LldpRemoteTablePoller extends SnmpBasePoller
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
    protected string $table = 'lldpRemTable';

    /**
     * SNMP OIDs to be queried.
     *
     * @var array
     */
    protected array $oids = [
        'lldpRemTimeMark'         => '.1.0.8802.1.1.2.1.4.1.1.1',
        'lldpRemLocalPortNum'     => '.1.0.8802.1.1.2.1.4.1.1.2',
        'lldpRemIndex'            => '.1.0.8802.1.1.2.1.4.1.1.3',
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
}

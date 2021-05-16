<?php

namespace Acamposm\SnmpPoller\Pollers;

final class LldpLocalPortTablePoller extends SnmpBasePoller
{
    /**
     * Specifies if the OIDs contained in  are table fields or leaves.
     *
     * @var bool
     */
    protected bool $is_table = true;

    /**
     * Name of the SNMP Table.
     *
     * @var  string
     */
    protected string $table = 'lldpLocPortTable';

    /**
     * SNMP OIDs to be queried.
     *
     * @var array
     */
    protected array $oids = [
        //'lldpLocPortNum'       => '.1.0.8802.1.1.2.1.3.7.1.1',
        'lldpLocPortIdSubtype' => '.1.0.8802.1.1.2.1.3.7.1.2',
        'lldpLocPortId'        => '.1.0.8802.1.1.2.1.3.7.1.3',
        'lldpLocPortDesc'      => '.1.0.8802.1.1.2.1.3.7.1.4',
    ];
}
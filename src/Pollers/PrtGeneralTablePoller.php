<?php

namespace Acamposm\SnmpPoller\Pollers;

final class PrtGeneralTablePoller extends SnmpBasePoller
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
    protected string $table = 'prtGeneralTable';

    /**
     * SNMP OIDs to be queried.
     *
     * @var array
     */
    protected array $oids = [
        'ptrGeneralPrinterName'  => '.1.3.6.1.2.1.43.5.1.1.16',
        'ptrGeneralSerialNumber' => '.1.3.6.1.2.1.43.5.1.1.17',
    ];
}

<?php

namespace Acamposm\SnmpPoller\Pollers;

use Acamposm\SnmpPoller\Interfaces\SnmpPollerInterface;

class SnmpBasePoller implements SnmpPollerInterface
{
    /**
     * Specifies if the OIDs contained in $oids are table fields or leaves.
     *
     * @var bool
     */
    protected bool $is_table = false;

    /**
     * SNMP OIDs to be queried.
     *
     * @var array
     */
    protected array $oids = [];

    /**
     * Name of the SNMP table.
     *
     * @var string
     */
    protected string $table = '';

    /**
     * Return an array with SNMP OIDs to be queried.
     *
     * @return array
     */
    public function getOids(): array
    {
        return $this->oids;
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * Check if SNMP poller is a table or a leaf.
     *
     * @return bool
     */
    public function isTable(): bool
    {
        return $this->is_table === true;
    }

    /**
     * @return object
     */
    public function info(): object
    {
        return (object) [
            'is_table' => $this->is_table,
            'oids' => $this->oids,
            'table' => $this->table,
        ];
    }
}
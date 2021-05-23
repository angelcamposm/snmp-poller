<?php

namespace Acamposm\SnmpPoller\Pollers;

use Acamposm\SnmpPoller\Interfaces\SnmpPollerInterface;
use Acamposm\SnmpPoller\Models\CustomPoller;

class SnmpCustomPoller implements SnmpPollerInterface
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
     * Unique ID of the Custom Poller.
     *
     * @var string
     */
    protected string $unique_id = '';


    public function __construct()
    {
        $this->configure();
    }

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
     * Return the name of the table.
     *
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * Return an object with the information of the Custom Poller.
     *
     * @return object
     */
    public function info(): object
    {
        return (object) [
            'is_table' => $this->is_table,
            'oids'     => $this->oids,
            'table'    => $this->table,
        ];
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
     * Builds the custom poller with the info stored in the database.
     */
    private function configure()
    {
        $poller = $this->getPollerDetails();

        $this->is_table = $poller->is_table;
        $this->oids = $this->getOidsFromPoller($poller);
    }

    /**
     * Returns the record of the database associated with the custom poller.
     * 
     * @return CustomPoller
     */
    private function getPollerDetails(): CustomPoller
    {
        return CustomPoller::where('unique_id', $this->unique_id)
            ->with('oids')
            ->first();
    }

    /**
     * Return an array with the oids of the custom poller stored in the database.
     * 
     * @param CustomPoller $poller
     * 
     * @return array
     */
    private function getOidsFromPoller(CustomPoller $poller): array
    {
        $oid_array = $poller->oids->toArray();

        $oids = [];

        foreach ($oid_array as $oid) {
            $oids[$oid['name']] = $oid['object_id'];
        }

        return $oids;
    }
}
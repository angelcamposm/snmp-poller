<?php

namespace Acamposm\SnmpPoller\Interfaces;

interface SnmpPollerInterface
{
    /**
     * Return an array with SNMP OIDs to be queried.
     *
     * @return array
     */
    public function getOids(): array;

    /**
     * Return the snmp table name associated with the poller.
     *
     * @return string
     */
    public function getTable(): string;

    /**
     * Return an object with information about the poller.
     *
     * @return object
     */
    public function info(): object;

    /**
     * Check if SNMP poller is a table or a leaf.
     *
     * @return bool
     */
    public function isTable(): bool;
}

<?php

namespace Acamposm\SnmpPoller\Interfaces;

interface SnmpParserInterface
{
    /**
     * Parse SNMP data.
     *
     * @return object
     */
    public function parse(): mixed;
}

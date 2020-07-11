<?php

namespace Acamposm\SnmpPoller\Parsers;

interface SnmpTypeInterface
{
    /**
     * Parses the value.
     *
     * @return mixed
     */
    public function Parse();
}

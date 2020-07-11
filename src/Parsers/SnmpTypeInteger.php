<?php

namespace Acamposm\SnmpPoller\Parsers;

class SnmpTypeInteger implements  SnmpTypeInterface
{
    /**
     * Data to be parsed.
     *
     * @var mixed
     */
    protected $data;

    /**
     * SnmpTypeCounter32 constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Returns the parsed data.
     * 
     * @return int
     */
    public function Parse(): int
    {
        return (int) explode(': ', $this->data)[1];
    }
}

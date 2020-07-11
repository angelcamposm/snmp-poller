<?php

namespace Acamposm\SnmpPoller\Parsers;

class SnmpTypeCounter64 implements  SnmpTypeInterface
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
     *
     * @return int
     */
    public function Parse(): int
    {
        return (int) explode(': ', $this->data)[1];
    }
}

<?php

namespace Acamposm\SnmpPoller\Parsers;

use Acamposm\SnmpPoller\Interfaces\SnmpParserInterface;

final class SnmpTypeInteger implements SnmpParserInterface
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
    public function Parse(): mixed
    {
        if (str_contains($this->data, ':')) {
            return (int) explode(': ', $this->data)[1];
        }

        return (int) $this->data;
    }
}

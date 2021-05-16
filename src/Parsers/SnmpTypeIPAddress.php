<?php

namespace Acamposm\SnmpPoller\Parsers;

use Acamposm\SnmpPoller\Interfaces\SnmpParserInterface;

final class SnmpTypeIPAddress implements SnmpParserInterface
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
        $replace = [
            'IpAddress: ',
            '"',
        ];

        $this->data = str_replace($replace, '', $data);
    }

    /**
     *
     * @return string
     */
    public function Parse(): string
    {
        return (string) trim($this->data);
    }
}

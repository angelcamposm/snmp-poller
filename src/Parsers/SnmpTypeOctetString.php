<?php

namespace Acamposm\SnmpPoller\Parsers;

class SnmpTypeOctetString implements  SnmpTypeInterface
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
            'DISPLAYSTRING: ',
            'Hex-STRING: ',
            'STRING: ',
            '"',
        ];

        $this->data = str_replace($replace, '', $data);
    }

    /**
     *
     * @return int
     */
    public function Parse(): string
    {
        return (string) trim($this->data);
    }
}

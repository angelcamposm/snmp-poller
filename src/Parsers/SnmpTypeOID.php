<?php

namespace Acamposm\SnmpPoller\Parsers;

class SnmpTypeOID implements  SnmpTypeInterface
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
            'OID:',
            '"'
        ];

        $this->data = trim(str_replace($replace, '', $data));
    }

    /**
     *
     * @return string
     */
    public function Parse(): string
    {
        return (string) $this->data;
    }
}

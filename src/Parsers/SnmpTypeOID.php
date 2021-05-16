<?php

namespace Acamposm\SnmpPoller\Parsers;

use Acamposm\SnmpPoller\Interfaces\SnmpParserInterface;

final class SnmpTypeOID implements SnmpParserInterface
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

<?php

namespace Acamposm\SnmpPoller\Parsers;

use stdClass;

class SnmpParser
{
    /**
     * The value to be parsed.
     *
     * @var mixed
     */
    protected $data;

    /**
     * SnmpTypeParser constructor.
     *
     * @param mixed $data
     */
    public function __construct(mixed $data)
    {
        $this->data = $data;
    }

    /**
     *
     * @param int $type
     * @param mixed $value
     * @return mixed
     */
    private function ParseType(int $type, mixed $value): mixed
    {
        /**
         * SNMP DATA TYPE CONSTANTS
         */
        // SNMP_INTEGER   =  2
        // SNMP_BIT_STR   =  3
        // SNMP_OCTET_STR =  4
        // SNMP_NULL      =  5
        // SNMP_OBJECT_ID =  6
        // SNMP_IPADDRESS =  64
        // SNMP_COUNTER   =  66
        // SNMP_UNSIGNED  =  66
        // SNMP_TIMETICKS =  67
        // SNMP_OPAQUE    =  68
        // SNMP_COUNTER64 =  70
        // SNMP_UINTEGER  =  71

        return match ($type) {
            SNMP_BIT_STR     => 'bit_str: ' . $value,
            65, SNMP_COUNTER => (new SnmpTypeCounter32($value))->Parse(),
            SNMP_COUNTER64   => (new SnmpTypeCounter64($value))->Parse(),
            SNMP_INTEGER     => (new SnmpTypeInteger($value))->Parse(),
            SNMP_IPADDRESS   => (new SnmpTypeIPAddress($value))->Parse(),
            SNMP_NULL        => 'null' . $value,
            SNMP_OBJECT_ID   => (new SnmpTypeOID($value))->Parse(),
            SNMP_OCTET_STR   => (new SnmpTypeOctetString($value))->Parse(),
            SNMP_OPAQUE      => 'opaque: ' . $value,
            SNMP_TIMETICKS   => (new SnmpTypeTimeticks($value))->Parse(),
            SNMP_UNSIGNED    => 'unsinged: ' . $value,
            SNMP_UINTEGER    => 'uinteger: ' . $value,
            default => [
                'type' => $type,
                'value' => $value
            ],
        };
    }

    /**
     * Returns the parsed data.
     *
     * @return mixed
     */
    public function parse(): mixed
    {
        if ($this->data instanceof stdClass) {
            return $this->ParseType($this->data->type, $this->data->value);
        }

        return $this->data;
    }
}
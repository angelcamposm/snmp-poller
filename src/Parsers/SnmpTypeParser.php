<?php

namespace Acamposm\SnmpPoller\Parsers;

use \stdClass;

class SnmpTypeParser
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
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Return the parsed data from the snmp type object.
     *
     * @return int|string
     */
    private function ParseType()
    {
        switch($this->data->type) {

            // Integer
            case 2:
                $type = new SnmpTypeInteger($this->data->value);
                return $type->Parse();
                break;

            // String
            case 4:
                $type = new SnmpTypeOctetString($this->data->value);
                return $type->Parse();
                break;

            // OID
            case 6:
                $type = new SnmpTypeOID($this->data->value);
                return $type->Parse();
                break;

            // Counter32
            case 64:
                $type = new SnmpTypeIPAddress($this->data->value);
                return $type->Parse();
                break;

            // Counter32
            case 65:
                $type = new SnmpTypeCounter32($this->data->value);
                return $type->Parse();
                break;

            // Gauge32
            case 66:
                $type = new SnmpTypeGauge32($this->data->value);
                return $type->Parse();
                break;

            // Timeticks
            case 67:
                $type = new SnmpTypeTimeticks($this->data->value);
                return $type->Parse();
                break;

            // Counter64
            case 70:
                $type = new SnmpTypeCounter64($this->data->value);
                return $type->Parse();
                break;

            default:
                return $this->data->value;
                break;
        }
    }

    /**
     * Returns the parsed data.
     *
     * @return int|mixed|string
     */
    public function Parse()
    {
        if ($this->data instanceof stdClass)
        {
            return $this->ParseType();
        }

        return $this->data;
    }
}

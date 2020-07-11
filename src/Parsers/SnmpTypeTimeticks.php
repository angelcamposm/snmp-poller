<?php

namespace Acamposm\SnmpPoller\Parsers;

class SnmpTypeTimeticks implements  SnmpTypeInterface
{
    /**
     * Data to be parsed.
     *
     * @var mixed
     */
    protected $data;

    /**
     * SnmpTypeTimetics constructor.
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
    public function Parse(): object
    {
        // Find in string '('
        $delimiter_1 = strpos($this->data, '(');

        // Find in string ')'
        $delimiter_2 = strpos($this->data, ')');

        $lenght = strlen($this->data);

        return (object) [
            'timeticks' => (int) substr($this->data, $delimiter_1 + 1, ($delimiter_2 - $delimiter_1) - 1),
            'readable' => (string) trim(substr($this->data, $delimiter_2 + 1)),
        ];
    }
}

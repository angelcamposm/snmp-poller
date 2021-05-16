<?php

namespace Acamposm\SnmpPoller\Parsers;

use Acamposm\SnmpPoller\Interfaces\SnmpParserInterface;

final class SnmpTypeTimeticks implements SnmpParserInterface
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
     * @return int
     */
    public function Parse(): int
    {
        return $this->data;

//        $timeticks = $this->data;
//        $timeticks = substr($timeticks, strpos($timeticks, '(') + 1);
//        $timeticks = substr($timeticks, 0, strpos($timeticks, ')'));
//
//        return (int) $timeticks;
    }
}

<?php

namespace Acamposm\SnmpPoller\Pollers;

use Acamposm\SnmpPoller\Fixers\PhysicalAddressFixer;
use Acamposm\SnmpPoller\SnmpPoller;
use Acamposm\SnmpPoller\Parsers\SnmpTypeParser;

final class ipNetToMediaTablePoller extends SnmpPoller
{
    /**
     * Returns the results of the snmp query as table.
     *
     * @var bool $is_table
     */
    protected bool $is_table = true;

    /**
     * SNMP OIDs from EntPhysical Table.
     *
     * @var  array
     */
    protected array $oids = [
		'ipNetToMediaIfIndex' => '.1.3.6.1.2.1.4.22.1.1',
		'ipNetToMediaPhysAddress' => '.1.3.6.1.2.1.4.22.1.2',
		'ipNetToMediaNetAddress' => '.1.3.6.1.2.1.4.22.1.3',
		'ipNetToMediaType' => '.1.3.6.1.2.1.4.22.1.4',
	];

    /**
     * Name of the SNMP Table
     *
     * @var  string
     */
    protected string $table = 'ipNetToMediaTable';

    public function Walk()
    {
    	$snmp_walk = [];

    	foreach ($this->oids as $key => $oid) {

            $query = @$this->session->walk($oid, true);

            if ($query === false) {
                return [
                    'data' => [
                        'code' => $this->session->getErrno(),
                        'message' =>$this->session->getError(),
                    ],
                    'result' => 'Exception',
                ];
                //throw new Exception($this->session->getError(), $this->session->getErrno());
            }

    		foreach ($query as $row => $value) {

    			$parser = new SnmpTypeParser($value);

    			if ($key === 'ipNetToMediaPhysAddress') {
                    $snmp_walk[$key][$row] = PhysicalAddressFixer::Fix($parser->Parse());
                } else {
                    $snmp_walk[$key][$row] = $parser->Parse();
                }
    		}
    	}

        return [
            'data' => ($this->is_table) ? $this->transposeTable($snmp_walk) : $snmp_walk,
            'result' => 'OK',
            'table' => $this->table,
        ];
    }
}

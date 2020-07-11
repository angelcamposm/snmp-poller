<?php

namespace Acamposm\SnmpPoller\Pollers;

use Acamposm\SnmpPoller\Fixers\PhysicalAddressFixer;
use Acamposm\SnmpPoller\Parsers\SnmpTypeParser;
use Acamposm\SnmpPoller\SnmpPoller;

class InterfacesTablePoller extends SnmpPoller
{
    /**
     * Returns the results of the snmp query as table
     *
     * @var bool
     */
    protected bool $is_table = true;

    /**
     * OIDs from ifTable table of IF-MIB file
     *
     * @var array
     */
    protected array $oids = [
        'ifIndex'           => '.1.3.6.1.2.1.2.2.1.1',
        'ifDescr'           => '.1.3.6.1.2.1.2.2.1.2',
        'ifType'            => '.1.3.6.1.2.1.2.2.1.3',
        'ifMtu'             => '.1.3.6.1.2.1.2.2.1.4',
        'ifSpeed'           => '.1.3.6.1.2.1.2.2.1.5',
        'ifPhysAddress'     => '.1.3.6.1.2.1.2.2.1.6',
        'ifAdminStatus'     => '.1.3.6.1.2.1.2.2.1.7',
        'ifOperStatus'      => '.1.3.6.1.2.1.2.2.1.8',
        'ifLastChange'      => '.1.3.6.1.2.1.2.2.1.9',
        'ifInOctets'        => '.1.3.6.1.2.1.2.2.1.10',
        'ifInUcastPkts'     => '.1.3.6.1.2.1.2.2.1.11',
        //'ifInNUcastPkts'    => '.1.3.6.1.2.1.2.2.1.12',  // Deprecated
        'ifInDiscards'      => '.1.3.6.1.2.1.2.2.1.13',
        'ifInErrors'        => '.1.3.6.1.2.1.2.2.1.14',
        'ifInUnknownProtos' => '.1.3.6.1.2.1.2.2.1.15',
        'ifOutOctets'       => '.1.3.6.1.2.1.2.2.1.16',
        'ifOutUcastPkts'    => '.1.3.6.1.2.1.2.2.1.17',
        //'ifOutNUcastPkts'   => '.1.3.6.1.2.1.2.2.1.18',  // Deprecated
        'ifOutDiscards'     => '.1.3.6.1.2.1.2.2.1.19',
        'ifOutErrors'       => '.1.3.6.1.2.1.2.2.1.20',
        //'ifOutQLen'         => '.1.3.6.1.2.1.2.2.1.21',  // Deprecated
        //'ifSpecific'        => '.1.3.6.1.2.1.2.2.1.22',  // Deprecated
    ];

    /**
     * Name of the SNMP Table
     *
     * @var string
     */
    protected string $table = 'ifTable';

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

                if ($key === 'ifPhysAddress') {
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

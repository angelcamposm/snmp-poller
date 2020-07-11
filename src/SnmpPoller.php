<?php

namespace Acamposm\SnmpPoller;

use \Exception;
use \SNMP;
use Acamposm\SnmpPoller\Parsers\SnmpTypeParser;

class SnmpPoller
{
    /**
     * If enabled the results of the snmp query are returned as a table
     *
     * @var boolean
     */
    protected bool $is_table = false;

    /**
     * Name of the SNMP Table
     *
     * @var string
     */
    protected string $table;

    /**
     * Array of SNMP OIDS to query to the snmp agent
     *
     * @var array
     */
    protected array $oids = [];

    /**
     * Instance of SNMP session
     *
     * @var SNMP session
     */
    protected SNMP $session;

    /**
     * SnmpPoller constructor.
     *
     * @param SNMP $snmp_session
     */
    public function __construct(SNMP $snmp_session)
    {
        $this->session = $snmp_session;

        // Set default values for this SNMP session
        $this->session->enum_print = Config('snmp.session.properties.enum_print');
        $this->session->exceptions_enabled = Config('snmp.session.properties.exceptions_enabled');
        $this->session->max_oids = Config('snmp.session.properties.max_oids');
        $this->session->oid_increasing_check = Config('snmp.session.properties.oid_increasing_check');
        $this->session->oid_output_format = Config('snmp.session.properties.oid_output_format');
        $this->session->quick_print = Config('snmp.session.properties.quick_print');
        $this->session->valueretrieval = Config('snmp.session.properties.value_retrieval');
    }

    /**
     * Create an instance.
     *
     * @param SNMP $snmp_session
     * @return static
     */
    public static function Create(SNMP $snmp_session)
    {
        return new static($snmp_session);
    }

    /**
     * Fetch $snmp_walk_data and return as table
     *
     * @param   array   $snmp_walk_data  SNMP query results
     *
     * @return  array
     */
    protected function transposeTable(array $snmp_walk_data): array
    {
        $table = [];

        foreach($snmp_walk_data as $column => $indexes)
        {
            foreach($indexes as $index => $value)
            {
                $table[$index][$column] = $value;
            }
        }

        return $table;
    }

    public function Get(string $oid = '')
    {
        if ($oid !== '') {

            $query = @$this->session->get($oid, true);

            if ($query === false) {
                throw new Exception($this->session->getError(), $this->session->getErrno());
            }
            return $query;
        }

        $snmp_walk = [];

        foreach ($this->oids as $key => $oid) {

            $query = @$this->session->get($oid, true);

            if ($query === false) {
                return [
                    'data' => [
                        'code' => $this->session->getErrno(),
                        'message' =>$this->session->getError(),
                    ],
                    'result' => 'Exception',
                ];
            }

            $parser = new SnmpTypeParser($query);
            $snmp_walk[$key] = $parser->Parse();
        }

        return [
            'data' => $snmp_walk,
            'result' => 'OK'
        ];
    }

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
                throw new Exception($this->session->getError(), $this->session->getErrno());
            }

    		foreach ($query as $row => $value) {
    			$parser = new SnmpTypeParser($value);
    			$snmp_walk[$key][$row] = $parser->Parse();
    		}
    	}
        return [
            'data' => ($this->is_table) ? $this->transposeTable($snmp_walk) : $snmp_walk,
            'result' => 'OK',
            'table' => $this->table,
        ];
    }
}

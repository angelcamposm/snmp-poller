<?php

namespace Acamposm\SnmpPoller;

use Acamposm\SnmpPoller\Interfaces\SnmpPollerInterface;
use Acamposm\SnmpPoller\Parsers\SnmpParser;
use Exception;
use SNMP;

class SnmpPoller
{
    /**
     * @var array
     */
    protected array $pollers = [];

    /**
     * Instance of SNMP.
     *
     * @var SNMP
     */
    protected SNMP $session;

    /**
     * SnmpPoller constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * Set the SNMP session to the host.
     *
     * @param SNMP $session
     *
     * @return $this
     */
    public function setSnmpSession(SNMP $session): SnmpPoller
    {
        $this->session = $session;

        $this->setSnmpSessionDefaultParameters();

        return $this;
    }

    /**
     * Adds a SNMP poller.
     *
     * @param string $poller
     *
     * @return SnmpPoller
     */
    public function addPoller(string $poller): SnmpPoller
    {
        $this->pollers[] = new $poller();

        return $this;
    }

    /**
     * Adds an array of SNMP Pollers.
     *
     * @param array $pollers
     *
     * @return SnmpPoller
     */
    public function addPollers(array $pollers): SnmpPoller
    {
        foreach ($pollers as $poller) {
            $this->pollers[] = new $poller();
        }

        return $this;
    }

    /**
     * Returns an array of SNMP pollers assigned to SNMP Session.
     *
     * @return array
     */
    public function getPollers(): array
    {
        return $this->pollers;
    }

    /**
     * Fetch $snmp_walk_data and return as table.
     *
     * @param array $snmp_walk_data SNMP query results
     *
     * @return array
     */
    private function transposeTable(array $snmp_walk_data): array
    {
        $table = [];

        foreach ($snmp_walk_data as $column => $indexes) {
            foreach ($indexes as $index => $value) {
                $table[$index][$column] = $value;
            }
        }

        return $table;
    }

    /**
     * @throws Exception
     *
     * @return array
     */
    public function run(): array
    {
        $pollers_data = [];

        if (false == $this->checkSnmpSession()) {
            throw new Exception('SNMP session not defined.');
        }

        if (false == $this->checkSnmpPollers()) {
            throw new Exception('Pollers not defined.');
        }

        foreach ($this->pollers as $poller) {
            $pollers_data[get_class($poller)] = $this->getPollerData($poller);
        }

        $this->closeSnmpSession();

        return $pollers_data;
    }

    /**
     * Check if SNMP Pollers are defined.
     *
     * @return bool
     */
    private function checkSnmpPollers(): bool
    {
        if (count($this->pollers) == 0) {
            return false;
        }

        return true;
    }

    /**
     * Check if SNMP session is defined.
     *
     * @return bool
     */
    private function checkSnmpSession(): bool
    {
        if (count($this->pollers) == 0) {
            return false;
        }

        return true;
    }

    /**
     * Close SNMP session.
     */
    private function closeSnmpSession(): void
    {
        $this->session->close();
    }

    /**
     * Runs the SNMP query on the host.
     *
     * @param $poller
     *
     * @return array
     */
    private function getPollerData($poller): array
    {
        if ($poller->isTable()) {
            return $this->walk($poller);
        }

        return $this->get($poller);
    }

    /**
     * Set the default parameters of the SNMP session.
     */
    private function setSnmpSessionDefaultParameters(): void
    {
        $this->session->exceptions_enabled = true;
        $this->session->oid_output_format = SNMP_OID_OUTPUT_NUMERIC;
        $this->session->quick_print = true;
        $this->session->valueretrieval = SNMP_VALUE_OBJECT | SNMP_VALUE_PLAIN;
    }

    /**
     * Returns an array with the error data.
     *
     * @return array
     */
    private function returnErrorData(): array
    {
        return [
            'data' => [
                'code'    => $this->session->getErrno(),
                'message' => $this->session->getError(),
            ],
            'result' => 'Exception',
        ];
    }

    /**
     * Get a SNMP leaf.
     *
     * @param SnmpPollerInterface $poller
     *
     * @return array
     */
    private function get(SnmpPollerInterface $poller): array
    {
        $snmp_get = [];

        foreach ($poller->getOids() as $key => $oid) {
            $query = @$this->session->get($oid, true);

            if ($query === false) {
                $this->returnErrorData();
            }

            $parser = new SnmpParser($query);

            $snmp_get[$key] = $parser->Parse();
        }

        return [
            'data'   => $snmp_get,
            'result' => 'OK',
        ];
    }

    /**
     * Walks over a column of a SNMP table.
     *
     * @param SnmpPollerInterface $poller
     *
     * @return array
     */
    private function walk(SnmpPollerInterface $poller): array
    {
        $snmp_walk = [];

        foreach ($poller->getOids() as $column => $oid) {
            $query = @$this->session->walk($oid, true);

            if ($query === false) {
                $this->returnErrorData();
            }

            foreach ($query as $row => $value) {
                $parser = new SnmpParser($value);

                $snmp_walk[$column][$row] = $parser->parse();
            }
        }

        return [
            'data'   => $poller->isTable() ? $this->transposeTable($snmp_walk) : $snmp_walk,
            'result' => 'OK',
            'table'  => $poller->getTable(),
        ];
    }
}

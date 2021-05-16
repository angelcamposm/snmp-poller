<?php

namespace Acamposm\SnmpPoller;

use Exception;

class PortScanner
{
    const METHOD_FSOCKOPEN = 0;
    const METHOD_SOCKETS = 1;
    const MAX_PORTS = 65535;

    protected string $host;
    protected int $method;
    protected int $port;
    protected string $protocol = 'tcp';

    public function __construct()
    {
        $this->method = self::METHOD_FSOCKOPEN;
    }

    public function tcp(): PortScanner
    {
        $this->protocol = 'tcp';

        return $this;
    }

    public function udp(): PortScanner
    {
        $this->protocol = 'udp';

        return $this;
    }

    public function host(string $host): PortScanner
    {
        if (!filter_var($host, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4|FILTER_FLAG_IPV6)) {
            Throw new Exception('IP Address not valid.');
        }

        $this->host = $host;

        return $this;
    }

    public function port(int $port): PortScanner
    {
        if ($port > self::MAX_PORTS) {
            Throw new Exception("The port can't be greater than 65535 (2^16 - 1)");
        }

        $this->port = $port;

        return $this;
    }

    public function method(int $method): PortScanner
    {
        if ($method != self::METHOD_FSOCKOPEN || $method != self::METHOD_SOCKETS) {
            Throw new Exception('Unknown method');
        }
        
        $this->method = $method;

        return $this;
    }

    public function check(): array
    {
        if ($this->method == self::METHOD_FSOCKOPEN) {
            return $this->runWithFSockOpen();
        }

        return $this->runWithSockets();
    }

    private function getData(): array
    {
        return [
            'host' => $this->host,
            'port' => $this->port,
            'protocol' => $this->protocol,
            'service' => $this->getServiceByPort(),
            'status' => 'closed',
        ];
    }

    private function runWithFSockOpen(): array
    {
        $data = $this->getData();

        $dst = "{$this->protocol}://{$this->host}";

        $connection = @fsockopen($dst, $this->port, $errno, $errstr, 2);

        if ($connection) {

            @fclose($connection);

            $data['status'] = 'open';
        }

        return $data;
    }

    private function runWithSockets(): array
    {
        $data = $this->getData();

        $protocol = ($this->protocol = 'tcp') ? SOL_TCP : SOL_UDP;

        $socket = @socket_create(AF_INET, SOCK_STREAM, $protocol);

        //socket_set_nonblock($socket);

        $time_out = array( 'sec' => 0, 'usec' => 100 );

        socket_set_option($socket, SOL_SOCKET, SO_SNDTIMEO, $time_out);
        socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, $time_out);

        if (!$socket) {
            Throw new Exception('Can\'t create a shocket');
        }

        $connection = @socket_connect($socket, $this->host, $this->port);

        if ($connection) {
            $data['status'] = 'open';
            @socket_close($socket);
        }

        return $data;
    }

    /**
     * Return the service name from the port or unknown.
     *
     * @return string
     */
    private function getServiceByPort(): string
    {
        $service = getservbyport($this->port, $this->protocol);

        return ($service != false) ? $service : 'unknown';
    }
}
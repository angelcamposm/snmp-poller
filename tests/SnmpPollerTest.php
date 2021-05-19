<?php

namespace Acamposm\SnmpPoller\Tests;

use Acamposm\SnmpPoller\Pollers\DiscoveryPoller;
use PHPUnit\Framework\TestCase;
use SNMP;

final class SnmpPollerTest extends TestCase
{
    public function testCanCreateAnSnmpInstance(): void
    {
        $snmp = new SNMP(SNMP::VERSION_2C, 'localhost', 'public');

        $this->assertInstanceOf(SNMP::class, $snmp);
    }

    public function testCanCreateADiscoveryPollerInstance()
    {
        $this->assertInstanceOf(DiscoveryPoller::class, new DiscoveryPoller());
    }

    public function testDiscoveryPollerReturnsAnArray()
    {
        $this->assertIsArray((new DiscoveryPoller())->getOids());
    }

    public function testDiscoveryPollerReturnsInfo()
    {
        $this->assertIsObject((new DiscoveryPoller())->info());
    }
}

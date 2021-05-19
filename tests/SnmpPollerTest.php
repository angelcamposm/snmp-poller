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

    public function testCanCreateADiscoveryPollerInstance(): DiscoveryPoller
    {
        $poller = new DiscoveryPoller();

        $this->assertInstanceOf(DiscoveryPoller::class, $poller);

        return $poller;
    }

    /**
     * @depends testCanCreateADiscoveryPollerInstance
     */
    public function testDiscoveryPollerReturnsAnArray(DiscoveryPoller $poller): void
    {
        $this->assertIsArray($poller->getOids());
    }

    /**
     * @depends testCanCreateADiscoveryPollerInstance
     */
    public function testDiscoveryPollerReturnsInfo(DiscoveryPoller $poller): void
    {
        $this->assertIsObject($poller->info());
    }

    /**
     * @depends testCanCreateADiscoveryPollerInstance
     */
    public function testDiscoveryPollerArrayHasKey(DiscoveryPoller $poller): void
    {
        $this->assertArrayHasKey('sysObjectID', $poller->getOids());
    }
}

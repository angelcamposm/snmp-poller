<?php

namespace Acamposm\SnmpPoller\Commands;

use Illuminate\Console\Command;

class InstallPackage extends Command
{
    protected $signature = 'ping:install';

    protected $description = 'Install the Ping package';

    public function handle()
    {
        if (file_exists(config_path('snmp.php'))) {
            $this->hidden = true;
        }

        $this->info('Installing Snmp Poller Package...');

        $this->info('Publishing configuration...');

        $this->call('vendor:publish', [
            '--provider' => 'Acamposm\SnmpPoller\SnmpPollerServiceProvider',
            '--tag'      => 'config',
        ]);

        $this->info('Snmp Poller Package installed.');
    }
}

<?php

namespace Acamposm\SnmpPoller\Console\Commands;

use Illuminate\Console\Command;

class InstallSnmpPackageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'snmp:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the SNMP Poller package';

    /**
     * Execute the console command.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     *
     * @return bool|null
     */
    public function handle()
    {
        if (file_exists(config_path('snmp.php'))) {
            $this->hidden = true;
        }

        $this->info('Installing Snmp Poller Package...');

        $this->info('Publishing package files...');

        $this->call('vendor:publish', [
            '--provider' => 'Acamposm\SnmpPoller\Providers\SnmpPollerServiceProvider',
        ]);

        $this->info('Snmp Poller Package installed.');
    }
}

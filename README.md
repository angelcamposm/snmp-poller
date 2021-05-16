# Laravel SNMP Poller Package

![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/acamposm/snmp-poller)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/acamposm/snmp-poller.svg?style=flat)](https://packagist.org/packages/acamposm/snmp-poller)
[![Build Status](https://img.shields.io/travis/acamposm/snmp-poller/master.svg?style=flat)](https://travis-ci.org/acamposm/snmp-poller)
[![Quality Score](https://img.shields.io/scrutinizer/g/acamposm/snmp-poller.svg?style=flat)](https://scrutinizer-ci.com/g/acamposm/snmp-poller)
[![StyleCI](https://github.styleci.io/repos/257021169/shield?branch=master&style=flat)](https://github.styleci.io/repos/257021169)
[![Total Downloads](https://img.shields.io/packagist/dt/acamposm/snmp-poller.svg?style=flat)](https://packagist.org/packages/acamposm/snmp-poller)

This Laravel package allows you to run SNMP queries to the snmp-agent of network hosts through laravel applications.

Before you run any SNMP query in your [Laravel](https://laravel.com/) application, you must install snmp in the operating system and enable the PHP extension **ext-php** in the php.ini to make queries.

- [Installation](#installation)
  - [Requirements](#requirements)
  - [Composer Install](#composer-install)
  - [Publish vendor assets](#publish-vendor-assets)
- [Usage](#usage)
  - [Single SNMP Poller class](#single-snmp-poller-class)
  - [Multiple SNMP Poller classes](#multiple-snmp-poller-classes)

## Installation

### Requirements

At the Operating System level, you need to install net-snmp.

**Debian**

```bash
apt-get install -y snmp
```

**Centos / RHEL**

```bash
yum install \
  net-snmp.x86_64 \
  net-snmp-agent-libs.x86_64 \
  net-snmp-libs.x86_64 \
  php-snmp.x86_64
```

At php.ini enable the extension ext-php.

### Composer Install

You can install the package via composer:

```bash
composer require acamposm/snmp-poller
```

### Publish vendor assets

Running this command, you can publish the vendor assets. This allows to modify the default package configuration.

````bash
php artisan snmp:install
````

## Usage



### Single SNMP Poller class

``` php
use Acamposm\SnmpPoller\SnmpPoller;
use Acamposm\SnmpPoller\Pollers\IfTablePoller;
use SNMP;

$session = new SNMP(SNMP::VERSION_2C, '192.168.10.254', 'csnmpv2c');

$poller = new SnmpPoller();

$poller->setSnmpSession($session)->addPoller(IfTablePoller::class)->run();
```

The output of an SNMP query to the snmp-agent of a network host with a single SNMP Poller class returns an array of objects with the data inside the data field.

**Note**: For demonstration purposes, all ports between 3 and 22 have been removed from the output of the query.

```
=> [
  "IfTablePoller" => {#653
    +"data": [
      1 => [
        "ifIndex" => 1,
        "ifDescr" => "",
        "ifType" => 6,
        "ifMtu" => 1500,
        "ifSpeed" => 1000000000,
        "ifPhysAddress" => "90:6C:AC:62:82:5B",
        "ifAdminStatus" => 1,
        "ifOperStatus" => 1,
        "ifLastChange" => 0,
        "ifInOctets" => 3808861579,
        "ifInUcastPkts" => 1130144532,
        "ifInDiscards" => 0,
        "ifInErrors" => 2,
        "ifInUnknownProtos" => 0,
        "ifOutOctets" => 1986123900,
        "ifOutUcastPkts" => 735043481,
        "ifOutDiscards" => 0,
        "ifOutErrors" => 0,
      ],
      2 => [
        "ifIndex" => 2,
        "ifDescr" => "",
        "ifType" => 6,
        "ifMtu" => 1500,
        "ifSpeed" => 0,
        "ifPhysAddress" => "90:6C:AC:62:82:5C",
        "ifAdminStatus" => 1,
        "ifOperStatus" => 2,
        "ifLastChange" => 0,
        "ifInOctets" => 0,
        "ifInUcastPkts" => 0,
        "ifInDiscards" => 0,
        "ifInErrors" => 0,
        "ifInUnknownProtos" => 0,
        "ifOutOctets" => 0,
        "ifOutUcastPkts" => 0,
        "ifOutDiscards" => 0,
        "ifOutErrors" => 0,
      ],
      3 => [ ... ],
      4 => [ ... ],
      5 => [ ... ],
      6 => [ ... ],
      7 => [ ... ],
      8 => [ ... ],
      9 => [ ... ],
      10 => [ ... ],
      11 => [ ... ],
      12 => [ ... ],
      13 => [ ... ],
      14 => [ ... ],
      15 => [ ... ],
      16 => [ ... ],
      17 => [ ... ],
      18 => [ ... ],
      19 => [ ... ],
      20 => [ ... ],
      21 => [ ... ],
      22 => [ ... ],
    ],
    +"poller": "Acamposm\SnmpPoller\Pollers\IfTablePoller",
    +"result": "OK",
    +"table": "ifTable",
  },
]
```

### Multiple SNMP Pollers classes

```php
use Acamposm\SnmpPoller\SnmpPoller;
use Acamposm\SnmpPoller\Pollers\IfTablePoller;
use Acamposm\SnmpPoller\Pollers\IfExtendedTablePoller;
use Acamposm\SnmpPoller\Pollers\EntPhysicalTablePoller;
use Acamposm\SnmpPoller\Pollers\LldpRemoteTablePoller;
use SNMP;

$session = new SNMP(SNMP::VERSION_2C, '192.168.10.254', 'csnmpv2c');

$poller = new SnmpPoller();

$pollerClasses = [
   IfTablePoller::class,
   IfExtendedTablePoller::class,
   EntPhysicalTablePoller::class,
   LldpRemoteTablePoller::class,
];

$poller->setSnmpSession($session)
       ->addPollers($pollerClasses)
       ->run();
```

The output of an SNMP query to the snmp-agent of a network host with multiple SNMP Poller classes returns an array of objects with the data inside the data field.

**Note**: For demonstration purposes, all ports between 3 and 22 have been removed from the output of the query.

```
=> [
  "IfTablePoller" => {
    +"data" => [
      1 => [
        "ifIndex" => 1,
        "ifDescr" => "",
        "ifType" => 6,
        "ifMtu" => 1500,
        "ifSpeed" => 1000000000,
        "ifPhysAddress" => "90:6C:AC:62:82:5B",
        "ifAdminStatus" => 1,
        "ifOperStatus" => 1,
        "ifLastChange" => 0,
        "ifInOctets" => 2518775779,
        "ifInUcastPkts" => 1129071509,
        "ifInDiscards" => 0,
        "ifInErrors" => 2,
        "ifInUnknownProtos" => 0,
        "ifOutOctets" => 1941896771,
        "ifOutUcastPkts" => 734653319,
        "ifOutDiscards" => 0,
        "ifOutErrors" => 0,
      ],
      2 => [
        "ifIndex" => 2,
        "ifDescr" => "",
        "ifType" => 6,
        "ifMtu" => 1500,
        "ifSpeed" => 0,
        "ifPhysAddress" => "90:6C:AC:62:82:5C",
        "ifAdminStatus" => 1,
        "ifOperStatus" => 2,
        "ifLastChange" => 0,
        "ifInOctets" => 0,
        "ifInUcastPkts" => 0,
        "ifInDiscards" => 0,
        "ifInErrors" => 0,
        "ifInUnknownProtos" => 0,
        "ifOutOctets" => 0,
        "ifOutUcastPkts" => 0,
        "ifOutDiscards" => 0,
        "ifOutErrors" => 0,
      ],
      3 => [ ... ],
      4 => [ ... ],
      5 => [ ... ],
      6 => [ ... ],
      7 => [ ... ],
      8 => [ ... ],
      9 => [ ... ],
      10 => [ ... ],
      11 => [ ... ],
      12 => [ ... ],
      13 => [ ... ],
      14 => [ ... ],
      15 => [ ... ],
      16 => [ ... ],
      17 => [ ... ],
      18 => [ ... ],
      19 => [ ... ],
      20 => [ ... ],
      21 => [ ... ],
      22 => [ ... ],
    ],
    +"poller": "Acamposm\SnmpPoller\Pollers\IfTablePoller",
    +"result": "OK",
    +"table": "ifTable",
  },
  "IfExtendedTablePoller" => {
    +"data" => [
      1 => [
        "ifName" => "wan1",
        "ifInMulticastPkts" => 0,
        "ifInBroadcastPkts" => 0,
        "ifOutMulticastPkts" => 0,
        "ifOutBroadcastPkts" => 0,
        "ifHCInOctets" => 1123505241577,
        "ifHCInUcastPkts" => 1129071513,
        "ifHCInMulticastPkts" => 0,
        "ifHCInBroadcastPkts" => 0,
        "ifHCOutOctets" => 255344967343,
        "ifHCOutUcastPkts" => 734653320,
        "ifHCOutMulticastPkts" => 0,
        "ifHCOutBroadcastPkts" => 0,
        "ifLinkUpDownTrapEnable" => 1,
        "ifHighSpeed" => 1000,
        "ifPromiscuousMode" => 2,
        "ifConnectorPresent" => 1,
        "ifAlias" => "",
        "ifCounterDiscontinuityTime" => 0,
      ],
      2 => [
        "ifName" => "wan2",
        "ifInMulticastPkts" => 0,
        "ifInBroadcastPkts" => 0,
        "ifOutMulticastPkts" => 0,
        "ifOutBroadcastPkts" => 0,
        "ifHCInOctets" => 0,
        "ifHCInUcastPkts" => 0,
        "ifHCInMulticastPkts" => 0,
        "ifHCInBroadcastPkts" => 0,
        "ifHCOutOctets" => 0,
        "ifHCOutUcastPkts" => 0,
        "ifHCOutMulticastPkts" => 0,
        "ifHCOutBroadcastPkts" => 0,
        "ifLinkUpDownTrapEnable" => 1,
        "ifHighSpeed" => 0,
        "ifPromiscuousMode" => 2,
        "ifConnectorPresent" => 1,
        "ifAlias" => "",
        "ifCounterDiscontinuityTime" => 0,
      ],
      3 => [ ... ],
      4 => [ ... ],
      5 => [ ... ],
      6 => [ ... ],
      7 => [ ... ],
      8 => [ ... ],
      9 => [ ... ],
      10 => [ ... ],
      11 => [ ... ],
      12 => [ ... ],
      13 => [ ... ],
      14 => [ ... ],
      15 => [ ... ],
      16 => [ ... ],
      17 => [ ... ],
      18 => [ ... ],
      19 => [ ... ],
      20 => [ ... ],
      21 => [ ... ],
      22 => [ ... ],
    ],
    +"poller" => "Acamposm\SnmpPoller\Pollers\IfExtendedTablePoller",
    +"result" => "OK",
    +"table" => "ifXTable",
  },
  "EntPhysicalTablePoller" => {
    +"data" => [
      1 => [
        "entPhysicalDescr" => "Fortinet FWF_51E, HW Serial#: FWF51E3U16000691",
        "entPhysicalVendorType" => ".1.3.6.1.4.1.12356.516.516.0",
        "entPhysicalContainedIn" => 0,
        "entPhysicalClass" => 3,
        "entPhysicalParentRelPos" => -1,
        "entPhysicalName" => "FWF_51E",
        "entPhysicalHardwareRev" => "",
        "entPhysicalFirmwareRev" => "",
        "entPhysicalSoftwareRev" => "FortiWiFi-51E v6.2.3,build1066,191218 (GA)",
        "entPhysicalSerialNum" => "FWF51E3U16000691",
        "entPhysicalMfgName" => "Fortinet",
        "entPhysicalModelName" => "FWF_51E",
        "entPhysicalAlias" => "",
        "entPhysicalAssetID" => "",
        "entPhysicalIsFRU" => 1,
      ],
      2 => [
        "entPhysicalDescr" => "Ethernet Port, Vitual Domain: root",
        "entPhysicalVendorType" => ".0.0.0",
        "entPhysicalContainedIn" => 1,
        "entPhysicalClass" => 10,
        "entPhysicalParentRelPos" => 1,
        "entPhysicalName" => "wan1",
        "entPhysicalHardwareRev" => "",
        "entPhysicalFirmwareRev" => "",
        "entPhysicalSoftwareRev" => "",
        "entPhysicalSerialNum" => "",
        "entPhysicalMfgName" => "",
        "entPhysicalModelName" => "",
        "entPhysicalAlias" => "",
        "entPhysicalAssetID" => "",
        "entPhysicalIsFRU" => 2,
      ],
      3 => [
        "entPhysicalDescr" => "Ethernet Port, Vitual Domain: root",
        "entPhysicalVendorType" => ".0.0.0",
        "entPhysicalContainedIn" => 1,
        "entPhysicalClass" => 10,
        "entPhysicalParentRelPos" => 2,
        "entPhysicalName" => "wan2",
        "entPhysicalHardwareRev" => "",
        "entPhysicalFirmwareRev" => "",
        "entPhysicalSoftwareRev" => "",
        "entPhysicalSerialNum" => "",
        "entPhysicalMfgName" => "",
        "entPhysicalModelName" => "",
        "entPhysicalAlias" => "",
        "entPhysicalAssetID" => "",
        "entPhysicalIsFRU" => 2,
      ],
      4 => [
        "entPhysicalDescr" => "Ethernet Port, Vitual Domain: root",
        "entPhysicalVendorType" => ".0.0.0",
        "entPhysicalContainedIn" => 1,
        "entPhysicalClass" => 10,
        "entPhysicalParentRelPos" => 3,
        "entPhysicalName" => "modem",
        "entPhysicalHardwareRev" => "",
        "entPhysicalFirmwareRev" => "",
        "entPhysicalSoftwareRev" => "",
        "entPhysicalSerialNum" => "",
        "entPhysicalMfgName" => "",
        "entPhysicalModelName" => "",
        "entPhysicalAlias" => "",
        "entPhysicalAssetID" => "",
        "entPhysicalIsFRU" => 2,
      ],
    ],
    +"poller": "Acamposm\SnmpPoller\Pollers\EntPhysicalTablePoller",
    +"result": "OK",
    +"table": "entPhysical",
  },
  "LldpRemoteTablePoller" => {
    +"data" => [
      "710800216.10.1" => [
        "lldpRemChassisIdSubtype" => 4,
        "lldpRemChassisId" => "2C:FA:A2:27:2F:5C",
        "lldpRemPortIdSubtype" => 7,
        "lldpRemPortId" => "1021",
        "lldpRemPortDesc" => "Alcatel-Lucent Enterprise 1/21",
        "lldpRemSysName" => "WTG-OS6450P24-SW01",
        "lldpRemSysDesc" => "Alcatel-Lucent Enterprise OS6450-P24 6.7.2.191.R04 GA, June 20, 2018.",
        "lldpRemSysCapSupported" => "(",
        "lldpRemSysCapEnabled" => "(",
      ],
    ],
    +"poller" => "Acamposm\SnmpPoller\Pollers\LldpRemoteTablePoller",
    +"result" => "OK",
    +"table" => "lldpRemTable",
  },
]
```

### Testing

For running the tests, in the console run:

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email angel.campos.m@outlook.com instead of using the issue tracker.

## Credits

- [Angel Campos](https://github.com/acamposm)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

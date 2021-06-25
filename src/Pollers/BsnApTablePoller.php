<?php

namespace Acamposm\SnmpPoller\Pollers;

final class BsnApTablePoller extends SnmpBasePoller
{
    /**
     * Specifies if the OIDs contained in $oids are table fields or leaves.
     *
     * @var bool
     */
    protected bool $is_table = true;

    /**
     * Name of the SNMP Table.
     *
     * @var string
     */
    protected string $table = 'bsnAPTable';

    /**
     * SNMP OID value mappings.
     *
     * @var array
     */
    protected array $mappings = [
        'bsnAPMonitorOnlyMode' => [
            0 => 'local',
            1 => 'monitor',
            2 => 'remote',
            3 => 'roguedetector',
            4 => 'sniffer',
            5 => 'bridge',
            6 => 'seConnect',
            7 => 'remoteBridge',
        ],
        'bsnAPOperationStatus' => [
            1 => 'associated',
            2 => 'disassociating',
            3 => 'downloading',
        ],
        'bsnAPType' => [
            1  => 'ap1000',
            2  => 'ap1030',
            3  => 'mimo',
            4  => 'unknown',
            5  => 'ap1100',
            6  => 'ap1130',
            7  => 'ap1240',
            8  => 'ap1200',
            9  => 'ap1310',
            10 => 'ap1500',
            11 => 'ap1250',
            12 => 'ap1505',
            13 => 'ap3201',
            14 => 'ap1520',
            15 => 'ap800',
            16 => 'ap1140',
            17 => 'ap800agn',
            18 => 'ap3500i',
            19 => 'ap3500e',
            20 => 'ap1260',
            21 => 'ap1040',
            22 => 'ap1550',
            23 => 'ap602i',
            24 => 'ap3500p',
            25 => 'ap802gn',
            26 => 'ap802agn',
            27 => 'ap3600i',
            28 => 'ap3600e',
            29 => 'ap2600i',
            30 => 'ap2600e',
            31 => 'ap802hagn',
            32 => 'ap1600i',
            33 => 'ap1600e',
            34 => 'ap702e',
            35 => 'ap702i',
            36 => 'ap3600p',
            37 => 'ap1530i',
            38 => 'ap1530e',
            39 => 'ap3700e',
            40 => 'ap3700i',
            41 => 'ap3700p',
            42 => 'ap2700e',
            43 => 'ap2700i',
            44 => 'ap702w',
            45 => 'wap2600i',
            46 => 'wap2600e',
            47 => 'wap1600i',
            48 => 'wap1600e',
            49 => 'wap702i',
            50 => 'wap702e',
            51 => 'ap1700i',
            52 => 'ap1700e',
            53 => 'ap1570e',
            54 => 'ap1570i'
        ],
    ];

    /**
     * SNMP OIDs to be queried.
     *
     * @var array
     */
    protected array $oids = [
        'bsnAPDot3MacAddress'     => '.1.3.6.1.4.1.14179.2.2.1.1.1',
        'bsnAPNumOfSlots'         => '.1.3.6.1.4.1.14179.2.2.1.1.2',
        'bsnAPName'               => '.1.3.6.1.4.1.14179.2.2.1.1.3',
        'bsnAPLocation'           => '.1.3.6.1.4.1.14179.2.2.1.1.4',
        'bsnAPMonitorOnlyMode'    => '.1.3.6.1.4.1.14179.2.2.1.1.5',
        'bsnAPOperationStatus'    => '.1.3.6.1.4.1.14179.2.2.1.1.6',
        'bsnAPSoftwareVersion'    => '.1.3.6.1.4.1.14179.2.2.1.1.8',
        'bsnAPBootVersion'        => '.1.3.6.1.4.1.14179.2.2.1.1.9',
        // 'bsnAPPrimaryMwarName'    => '.1.3.6.1.4.1.14179.2.2.1.1.10',
        // 'bsnAPReset'              => '.1.3.6.1.4.1.14179.2.2.1.1.11',
        // 'bsnAPStatsTimer'         => '.1.3.6.1.4.1.14179.2.2.1.1.12',
        // 'bsnAPPortNumber'         => '.1.3.6.1.4.1.14179.2.2.1.1.13',
        'bsnAPModel'              => '.1.3.6.1.4.1.14179.2.2.1.1.16',
        'bsnAPSerialNumber'       => '.1.3.6.1.4.1.14179.2.2.1.1.17',
        // 'bsnAPClearConfig'        => '.1.3.6.1.4.1.14179.2.2.1.1.18',
        'bsnAPIpAddress'          => '.1.3.6.1.4.1.14179.2.2.1.1.19',
        // 'bsnAPMirrorMode'         => '.1.3.6.1.4.1.14179.2.2.1.1.20',
        // 'bsnAPRemoteModeSupport'  => '.1.3.6.1.4.1.14179.2.2.1.1.21',
        'bsnAPType'               => '.1.3.6.1.4.1.14179.2.2.1.1.22',
        // 'bsnAPSecondaryMwarName'  => '.1.3.6.1.4.1.14179.2.2.1.1.23',
        // 'bsnAPTertiaryMwarName'   => '.1.3.6.1.4.1.14179.2.2.1.1.24',
        'bsnAPIsStaticIP'         => '.1.3.6.1.4.1.14179.2.2.1.1.25',
        'bsnAPNetmask'            => '.1.3.6.1.4.1.14179.2.2.1.1.26',
        'bsnAPGateway'            => '.1.3.6.1.4.1.14179.2.2.1.1.27',
        'bsnAPStaticIPAddress'    => '.1.3.6.1.4.1.14179.2.2.1.1.28',
        'bsnAPBridgingSupport'    => '.1.3.6.1.4.1.14179.2.2.1.1.29',
        'bsnAPGroupVlanName'      => '.1.3.6.1.4.1.14179.2.2.1.1.30',
        'bsnAPIOSVersion'         => '.1.3.6.1.4.1.14179.2.2.1.1.31',
        'bsnAPCertificateType'    => '.1.3.6.1.4.1.14179.2.2.1.1.32',
        'bsnAPEthernetMacAddress' => '.1.3.6.1.4.1.14179.2.2.1.1.33',
        'bsnAPAdminStatus'        => '.1.3.6.1.4.1.14179.2.2.1.1.37',
    ];
}

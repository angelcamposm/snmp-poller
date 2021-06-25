<?php

namespace Acamposm\SnmpPoller\Pollers;

final class BsnApIfTablePoller extends SnmpBasePoller
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
    protected string $table = 'bsnAPIfTable';

    /**
     * SNMP OID value mappings.
     *
     * @var array
     */
    protected array $mappings = [
        'bsnAPIfType' => [
            1 => 'dot11b',
            2 => 'dot11a',
            3 => 'dot11abgn',
            4 => 'uwb',
        ],
        'bsnAPIfPhyChannelAssignment' => [
            1 => 'automatic',
            2 => 'customized',
        ],
        'bsnAPIfPhyChannelNumber' => [
            1   => 'ch1',
            2   => 'ch2',
            3   => 'ch3',
            4   => 'ch4',
            5   => 'ch5',
            6   => 'ch6',
            7   => 'ch7',
            8   => 'ch8',
            9   => 'ch9',
            10  => 'ch10',
            11  => 'ch11',
            12  => 'ch12',
            13  => 'ch13',
            14  => 'ch14',
            20  => 'ch20',
            21  => 'ch21',
            22  => 'ch22',
            23  => 'ch23',
            24  => 'ch24',
            25  => 'ch25',
            26  => 'ch26',
            34  => 'ch34',
            36  => 'ch36',
            38  => 'ch38',
            40  => 'ch40',
            42  => 'ch42',
            44  => 'ch44',
            46  => 'ch46',
            48  => 'ch48',
            52  => 'ch52',
            56  => 'ch56',
            60  => 'ch60',
            64  => 'ch64',
            100 => 'ch100',
            104 => 'ch104',
            108 => 'ch108',
            112 => 'ch112',
            116 => 'ch116',
            120 => 'ch120',
            124 => 'ch124',
            128 => 'ch128',
            132 => 'ch132',
            136 => 'ch136',
            140 => 'ch140',
            149 => 'ch149',
            153 => 'ch153',
            157 => 'ch157',
            161 => 'ch161',
            165 => 'ch165',
            169 => 'ch169',
            173 => 'ch173',
        ],
        'bsnAPIfPhyTxPowerControl' => [
            1 => 'automatic',
            2 => 'customized',
        ],
        'bsnAPIfPhyAntennaMode' => [
            1  => 'sectorA',
            2  => 'sectorB',
            3  => 'omni',
            99 => 'notapplicable',
        ],
        'bsnAPIfPhyAntennaType' => [
            1 => 'internal',
            2 => 'external',
        ],
        'bsnAPIfOperStatus' => [
            1 => 'up',
            2 => 'down',
        ],
        'bsnAPIfRegulatoryDomainSupport' => [
            0 => 'notSupported',
            1 => 'supported',
        ],
        'bsnAPIfAdminStatus' => [
            1 => 'enabled',
            2 => 'disabled',
        ],
    ];

    /**
     * SNMP OIDs to be queried.
     *
     * @var array
     */
    protected array $oids = [
        'bsnAPIfSlotId'                  => '.1.3.6.1.4.1.14179.2.2.2.1.1',
        'bsnAPIfType'                    => '.1.3.6.1.4.1.14179.2.2.2.1.2',
        'bsnAPIfPhyChannelAssignment'    => '.1.3.6.1.4.1.14179.2.2.2.1.3',
        'bsnAPIfPhyChannelNumber'        => '.1.3.6.1.4.1.14179.2.2.2.1.4',
        'bsnAPIfPhyTxPowerControl'       => '.1.3.6.1.4.1.14179.2.2.2.1.5',
        'bsnAPIfPhyTxPowerLevel'         => '.1.3.6.1.4.1.14179.2.2.2.1.6',
        'bsnAPIfPhyAntennaMode'          => '.1.3.6.1.4.1.14179.2.2.2.1.7',
        'bsnAPIfPhyAntennaType'          => '.1.3.6.1.4.1.14179.2.2.2.1.8',
        // 'bsnAPIfPhyAntennaDiversity'     => '.1.3.6.1.4.1.14179.2.2.2.1.9',
        // 'bsnAPIfCellSiteConfigId'        => '.1.3.6.1.4.1.14179.2.2.2.1.10',
        'bsnAPIfNumberOfVaps'            => '.1.3.6.1.4.1.14179.2.2.2.1.11',
        'bsnAPIfOperStatus'              => '.1.3.6.1.4.1.14179.2.2.2.1.12',
        'bsnAPIfPortNumber'              => '.1.3.6.1.4.1.14179.2.2.2.1.13',
        // 'bsnAPIfPhyAntennaOptions'       => '.1.3.6.1.4.1.14179.2.2.2.1.14',
        'bsnApIfNoOfUsers'               => '.1.3.6.1.4.1.14179.2.2.2.1.15',
        'bsnAPIfWlanOverride'            => '.1.3.6.1.4.1.14179.2.2.2.1.16',
        // 'bsnAPIfPacketsSniffingFeature'  => '.1.3.6.1.4.1.14179.2.2.2.1.17',
        // 'bsnAPIfSniffChannel'            => '.1.3.6.1.4.1.14179.2.2.2.1.18',
        // 'bsnAPIfSniffServerIPAddress'    => '.1.3.6.1.4.1.14179.2.2.2.1.19',
        'bsnAPIfAntennaGain'             => '.1.3.6.1.4.1.14179.2.2.2.1.20',
        'bsnAPIfChannelList'             => '.1.3.6.1.4.1.14179.2.2.2.1.21',
        // 'bsnAPIfAbsolutePowerList'       => '.1.3.6.1.4.1.14179.2.2.2.1.22',
        'bsnAPIfRegulatoryDomainSupport' => '.1.3.6.1.4.1.14179.2.2.2.1.23',
        'bsnAPIfAdminStatus'             => '.1.3.6.1.4.1.14179.2.2.2.1.34',
    ];
}

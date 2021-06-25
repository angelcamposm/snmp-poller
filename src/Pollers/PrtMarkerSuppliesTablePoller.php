<?php

namespace Acamposm\SnmpPoller\Pollers;

final class PrtMarkerSuppliesTablePoller extends SnmpBasePoller
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
    protected string $table = 'prtMarkerSuppliesTable';

    protected array $mappings = [
        'prtMarkerSuppliesClass' => [
            1 => 'other',
            3 => 'supplyThatIsConsumed',
            4 => 'receptacleThatIsFilled',
        ],
        'prtMarkerSuppliesType' => [
            1  => 'other',
            2  => 'unknown',
            3  => 'toner',
            4  => 'wasteToner',
            5  => 'ink',
            6  => 'inkCartridge',
            7  => 'inkRibbon',
            8  => 'wasteInk',
            9  => 'opc',
            10 => 'developer',
            11 => 'fuserOil',
            12 => 'solidWax',
            13 => 'ribbonWax',
            14 => 'wasteWax',
            15 => 'fuser',
            16 => 'coronaWire',
            17 => 'fuserOilWick',
            18 => 'cleanerUnit',
            19 => 'fuserCleaningPad',
            20 => 'transferUnit',
            21 => 'tonerCartridge',
            22 => 'fuserOiler',
            23 => 'water',
            24 => 'wasteWater',
            25 => 'glueWaterAdditive',
            26 => 'wastePaper',
            27 => 'bindingSupply',
            28 => 'bandingSupply',
            29 => 'stitchingWire',
            30 => 'shrinkWrap',
            31 => 'paperWrap',
            32 => 'staples',
            33 => 'inserts',
            34 => 'covers',
        ],
        'prtMarkerSuppliesSupplyUnit' => [
            1  => 'other',
            2  => 'unknown',
            3  => 'tenThousandthsOfInches',
            4  => 'micrometers',
            7  => 'impressions',
            8  => 'sheets',
            11 => 'hours',
            12 => 'thousandthsOfOunces',
            13 => 'tenthsOfGrams',
            14 => 'hundrethsOfFluidOunces',
            15 => 'tenthsOfMilliliters',
            16 => 'feet',
            17 => 'meters',
            18 => 'items',
            19 => 'percent',
        ],
    ];

    /**
     * SNMP OIDs to be queried.
     *
     * @var array
     */
    protected array $oids = [
        // 'prtMarkerSuppliesIndex'         => '.1.3.6.1.2.1.43.11.1.1.1',
        // 'prtMarkerSuppliesMarkerIndex'   => '.1.3.6.1.2.1.43.11.1.1.2',
        'prtMarkerSuppliesColorantIndex' => '.1.3.6.1.2.1.43.11.1.1.3',
        'prtMarkerSuppliesClass'         => '.1.3.6.1.2.1.43.11.1.1.4',
        'prtMarkerSuppliesType'          => '.1.3.6.1.2.1.43.11.1.1.5',
        'prtMarkerSuppliesDescription'   => '.1.3.6.1.2.1.43.11.1.1.6',
        'prtMarkerSuppliesSupplyUnit'    => '.1.3.6.1.2.1.43.11.1.1.7',
        'prtMarkerSuppliesMaxCapacity'   => '.1.3.6.1.2.1.43.11.1.1.8',
        'prtMarkerSuppliesLevel'         => '.1.3.6.1.2.1.43.11.1.1.9',
    ];

}
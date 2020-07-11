<?php

namespace Acamposm\SnmpPoller\Fixers;

class PhysicalAddressFixer
{
    /**
     * The Mac Address.
     *
     * @var string
     */
    protected string $physicalAddress = '';

    /**
     * PhysicalAddressFixer constructor.
     *
     * @param $physicalAddress
     */
    public function __construct($physicalAddress)
    {
        $this->physicalAddress = strtoupper($physicalAddress);
    }

    /**
     * This function verifies the length of the mac address passed as an
     * argument, and add leading zeros to the octets if the length is less
     * than 17 characters long.
     *
     * @param string $physicalAddress
     *
     * @return string
     */
    public static function Fix(string $physicalAddress): string
    {
        if (strlen($physicalAddress) === 17) {
            return strtoupper($physicalAddress);
        }

        $newPhysicalAddress = [];

        foreach(explode(':', $physicalAddress) as $octet) {
            array_push(
                $newPhysicalAddress,
                (strlen($octet) < 2) ? '0'.$octet : $octet
            );
        }

        return strtoupper(implode(':', $newPhysicalAddress));
    }
}

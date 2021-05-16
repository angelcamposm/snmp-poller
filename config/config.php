<?php

return [

    /**
     *
     */
    'session' => [

        'properties' => [

            /**
             * Controls the way enum values are printed
             *
             * Parameter toggles if walk/get etc. should automatically lookup
             * enum values in the MIB and return them together with their
             * human readable string.
             *
             * @var  bool
             */
            'enum_print' => false,

            /**
             * Controls which failures will raise SNMPException instead of warning.
             * Use bitwise OR'ed SNMP::ERRNO_* constants.
             *
             * @var  bool
             */
            'exceptions_enabled' => true,

            /**
             *  Maximum OID per GET/SET/GETBULK request.
             *
             * @var  int
             */
            'max_oids' => 20,

            /**
             * Controls OID output format
             *
             * SNMP_OID_OUTPUT_FULL	    .iso.org.dod.internet.mgmt.mib-2.system.sysUpTime.sysUpTimeInstance
             * SNMP_OID_OUTPUT_NUMERIC	.1.3.6.1.2.1.1.3.0
             * SNMP_OID_OUTPUT_MODULE	DISMAN-EVENT-MIB::sysUpTimeInstance
             * SNMP_OID_OUTPUT_SUFFIX	sysUpTimeInstance
             * SNMP_OID_OUTPUT_UCD	    system.sysUpTime.sysUpTimeInstance
             * SNMP_OID_OUTPUT_NONE	    Undefined
             *
             * @var  int
             */
            'oid_output_format' => SNMP_OID_OUTPUT_NUMERIC,

            /**
             * Controls disabling check for increasing OID while walking OID tree
             *
             * Some SNMP agents are known for returning OIDs out of order but can
             * complete the walk anyway. Other agents return OIDs that are out of
             * order and can cause SNMP::walk() to loop indefinitely until memory
             * limit will be reached. PHP SNMP library by default performs OID
             * increasing check and stops walking on OID tree when it detects
             * possible loop with issuing warning about non-increasing OID faced.
             * Set oid_increasing_check to FALSE to disable this check.
             *
             * @var
             */
            'oid_increasing_check' => true,

            /**
             * Value of quick_print within the NET-SNMP library.
             *
             * Sets the value of quick_print within the NET-SNMP library.
             * When this is set (1), the SNMP library will return 'quick printed'
             * values. This means that just the value will be printed.
             * When quick_print is not enabled (default) the UCD SNMP library
             * prints extra information including the type of the value
             * (i.e. IpAddress or OID).
             * Additionally, if quick_print is not enabled, the library prints
             * additional hex values for all strings of three characters or less.
             *
             * @var  bool
             */
            'quick_print' => false,

            /**
             * Controls the method how the SNMP values will be returned.
             *
             * SNMP_VALUE_LIBRARY  The return values will be as returned by the
             *                     Net-SNMP library.
             * SNMP_VALUE_PLAIN    The return values will be the plain value
             *                     without the SNMP type hint.
             * SNMP_VALUE_OBJECT   The return values will be objects with the
             *                     properties "value" and "type", where the
             *                     latter is one of the SNMP_OCTET_STR,
             *                     SNMP_COUNTER etc. constants.
             *                     The way "value" is returned is based on which
             *                     one of SNMP_VALUE_LIBRARY, SNMP_VALUE_PLAIN
             *                     is set.
             *
             * @var
             */
            'value_retrieval' => SNMP_VALUE_OBJECT|SNMP_VALUE_PLAIN,
        ],
    ],
];
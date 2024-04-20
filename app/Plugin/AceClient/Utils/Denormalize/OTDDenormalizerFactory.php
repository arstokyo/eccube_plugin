<?php

namespace Plugin\AceClient\Utils\Denormalize;

class OTDDenormalizerFactory
{
    /**
     * Make OTDXmlDenormalizer
     * 
     * @return OTDXmlDenormalizer
     */
    public static function makeOTDXmlDenormalizer(): OTDXmlDenormalizer
    {
        return new OTDXmlDenormalizer();
    }

    /**
     * Make OTDNullDenormalizer
     * 
     * @return OTDXmlDenormalizer
     */
    public static function makeOTDNullDenormalizer(): OTDNullDenormalizer
    {
        return new OTDNullDenormalizer();
    }

    /**
     * Make OTDNoDenormalizer
     * 
     * @return OTDNoDenormalizer
     */
    public static function makeOTDNoDenormalizer(): OTDNoDenormalizer
    {
        return new OTDNoDenormalizer();
    }

}
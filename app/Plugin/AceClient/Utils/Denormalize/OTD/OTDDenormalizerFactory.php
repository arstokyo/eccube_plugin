<?php

namespace Plugin\AceClient\Utils\Denormalize\OTD;

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
     * @return OTDObjectDenormalizer
     */
    public static function makeOTDObjectDenormalizer(): OTDObjectDenormalizer
    {
        return new OTDObjectDenormalizer();
    }

    /**
     * Make OTDJsonDenormalizer
     * 
     * @return OTDJsonDenormalizer
     */
    public static function makeOTDJsonDenormalizer(): OTDJsonDenormalizer
    {
        return new OTDJsonDenormalizer();
    }

}
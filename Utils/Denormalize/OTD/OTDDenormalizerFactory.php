<?php

namespace Plugin\AceClient\Utils\Denormalize\OTD;


/**
 * Factory for Object to Data Denormalizer.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class OTDDenormalizerFactory
{
    /**
     * Make OTDXmlDenormalizer
     * 
     * @param OTDDelegateInterface $delegate
     * @return OTDXmlDenormalizer
     */
    public static function makeOTDXmlDenormalizer($delegate): OTDXmlDenormalizer
    {
        return new OTDXmlDenormalizer($delegate);
    }

    /**
     * Make OTDNullDenormalizer
     * 
     * @param OTDDelegateInterface $delegate
     * @return OTDNullDenormalizer
     */
    public static function makeOTDNullDenormalizer($delegate): OTDNullDenormalizer
    {
        return new OTDNullDenormalizer($delegate);
    }

    /**
     * Make OTDNoDenormalizer
     * 
     * @param OTDDelegateInterface $delegate
     * @return OTDObjectDenormalizer
     */
    public static function makeOTDObjectDenormalizer($delegate): OTDObjectDenormalizer
    {
        return new OTDObjectDenormalizer($delegate);
    }

    /**
     * Make OTDJsonDenormalizer
     * 
     * @param OTDDelegateInterface $delegate
     * @return OTDJsonDenormalizer
     */
    public static function makeOTDJsonDenormalizer($delegate): OTDJsonDenormalizer
    {
        return new OTDJsonDenormalizer($delegate);
    }

}
<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\Util\Denormalizer\OTD;

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
     *
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
     *
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
     *
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
     *
     * @return OTDJsonDenormalizer
     */
    public static function makeOTDJsonDenormalizer($delegate): OTDJsonDenormalizer
    {
        return new OTDJsonDenormalizer($delegate);
    }
}

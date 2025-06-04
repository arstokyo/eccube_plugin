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
 * Object To Data Denormalizer for JSON.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class OTDJsonDenormalizer extends OTDDenormalizerAbstract
{
    /**
     * {@inheritDoc}
     */
    public function denormalizeOTD()
    {
        // TODO: Implement denormalizeOTD() method.
        return $this->delegate->getObject();
    }
}

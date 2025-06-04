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
 * Abstract class for Object To Data Denormalizer.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
abstract class OTDDenormalizerAbstract implements OTDDenormalizerInterface
{
    protected OTDDelegateInterface $delegate;

    public function __construct(
        OTDDelegateInterface $delegate,
    ) {
        $this->delegate = $delegate;
    }

    /**
     * {@inheritDoc}
     */
    public function getDelegate(): OTDDelegateInterface
    {
        return $this->delegate;
    }
}

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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Card\GMO;

/**
 * Trait for GMODps Order ID
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait GMODpsOrderIdTrait
{
    /**
     * GMODps Order ID
     *
     * @var string|null
     */
    protected ?string $gmodpsorderid = null;

    /**
     * {@inheritDoc}
     */
    public function getGmodpsorderid(): ?string
    {
        return $this->gmodpsorderid;
    }

    /**
     * {@inheritDoc}
     */
    public function setGmodpsorderid(?string $gmodpsorderid)
    {
        $this->gmodpsorderid = $gmodpsorderid;

        return $this;
    }
}

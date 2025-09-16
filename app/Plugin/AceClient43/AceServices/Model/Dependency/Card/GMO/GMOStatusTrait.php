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
 * Trait for GMOステータス
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait GMOStatusTrait
{
    /** @var ?int GMOステータス */
    protected ?int $gmostatus = null;

    /**
     * {@inheritDoc}
     */
    public function getGmostatus(): ?int
    {
        return $this->gmostatus;
    }

    /**
     * {@inheritDoc}
     */
    public function setGmostatus(?int $gmostatus)
    {
        $this->gmostatus = $gmostatus;

        return $this;
    }
}

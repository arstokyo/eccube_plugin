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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

/**
 * Trait for 商品区分
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait GkbnTrait
{
    /** @var ?int 商品区分 */
    protected ?int $gkbn = null;

    /**
     * {@inheritDoc}
     */
    public function getGkbn(): ?int
    {
        return $this->gkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setGkbn(?int $gkbn)
    {
        $this->gkbn = $gkbn;

        return $this;
    }
}

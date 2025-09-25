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

namespace Plugin\AceClient43\AceServices\Model\Dependency\OkuriAndNouhin;

/**
 * Trait for 文章指定コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait BunsyoTrait
{
    /** @var ?int 文章指定コード */
    protected ?int $bunsyo = null;

    /**
     * {@inheritDoc}
     */
    public function getBunsyo(): ?int
    {
        return $this->bunsyo;
    }

    /**
     * {@inheritDoc}
     */
    public function setBunsyo(?int $bunsyo)
    {
        $this->bunsyo = $bunsyo;

        return $this;
    }
}

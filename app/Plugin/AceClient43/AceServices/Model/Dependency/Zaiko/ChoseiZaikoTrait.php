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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Zaiko;

/**
 * Trait for 在庫調整数
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ChoseiZaikoTrait
{
    /** @var ?int 在庫調整数 */
    protected ?int $choseizaiko = null;

    /**
     * {@inheritDoc}
     */
    public function getChoseizaiko(): ?int
    {
        return $this->choseizaiko;
    }

    /**
     * {@inheritDoc}
     */
    public function setChoseizaiko(?int $choseizaiko)
    {
        $this->choseizaiko = $choseizaiko;

        return $this;
    }
}

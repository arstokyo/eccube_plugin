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
 * Trait for 在庫数
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ZaikoTrait
{
    /** @var ?int 在庫数 */
    protected ?int $zaiko = null;

    /**
     * {@inheritDoc}
     */
    public function getZaiko(): ?int
    {
        return max((int) $this->zaiko, 0);
    }

    public function getPureZaiko(): ?int
    {
        return $this->zaiko;
    }

    /**
     * {@inheritDoc}
     */
    public function setZaiko(?int $zaiko)
    {
        $this->zaiko = $zaiko;

        return $this;
    }
}

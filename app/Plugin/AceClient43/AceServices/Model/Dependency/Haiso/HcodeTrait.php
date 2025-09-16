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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Haiso;

/**
 * Trait for 配送方法コード
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait HcodeTrait
{
    /** @var ?int 配送方法コード */
    protected ?int $hcode = null;

    /**
     * {@inheritDoc}
     */
    public function getHcode(): ?int
    {
        return $this->hcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setHcode(?int $hcode)
    {
        $this->hcode = $hcode;

        return $this;
    }
}

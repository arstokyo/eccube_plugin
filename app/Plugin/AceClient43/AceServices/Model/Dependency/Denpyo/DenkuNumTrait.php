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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for 伝票フラグ
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait DenkuNumTrait
{
    /** @var ?int 伝票フラグ */
    protected ?int $denkuNum = null;

    /**
     * {@inheritDoc}
     */
    public function getDenkuNum(): ?int
    {
        return $this->denkuNum;
    }

    /**
     * {@inheritDoc}
     */
    public function setDenkuNum(?int $denkuNum)
    {
        $this->denkuNum = $denkuNum;

        return $this;
    }
}

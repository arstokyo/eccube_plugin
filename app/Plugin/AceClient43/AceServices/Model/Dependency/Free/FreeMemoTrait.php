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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Free;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait For Freememo
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait FreeMemoTrait
{
    use NoCategory\KubunTrait;

    /** @var ?string フリーマスタID */
    protected ?string $foid = null;

    /** @var ?string メモ */
    protected ?string $memo = null;

    /**
     * {@inheritDoc}
     */
    public function getFoid(): ?string
    {
        return $this->foid;
    }

    /**
     * {@inheritDoc}
     */
    public function setFoid(?string $foid)
    {
        $this->foid = $foid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMemo(): ?string
    {
        return $this->memo;
    }

    /**
     * {@inheritDoc}
     */
    public function setMemo(?string $memo)
    {
        $this->memo = $memo;

        return $this;
    }
}

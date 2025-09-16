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
 * Class for FreeCodeModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GoodFreeModelGroup implements GoodFreeModelGroupInterface
{
    use GdidTrait;

    /** @var ?int フリー項目区分 */
    protected ?int $fmkbn = null;

    /** @var ?string フリー内容 */
    protected ?string $free = null;

    /**
     * {@inheritDoc}
     */
    public function getFmkbn(): ?int
    {
        return $this->fmkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setFmkbn(?int $fmkbn)
    {
        $this->fmkbn = $fmkbn;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFree(): ?string
    {
        return $this->free;
    }

    /**
     * {@inheritDoc}
     */
    public function setFree(?string $free)
    {
        $this->free = $free;

        return $this;
    }
}

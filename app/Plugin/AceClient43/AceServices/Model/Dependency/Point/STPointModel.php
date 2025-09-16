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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Point;

/**
 * Model for STPoint
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class STPointModel implements STPointModelInterface
{
    use PointTrait;

    /** @var ?string ポイント算出日付 */
    protected ?string $iday = null;

    /** @var ?string 最新購入日 */
    protected ?string $inppointMaxday = null;

    /**
     * {@inheritDoc}
     */
    public function getIday(): ?string
    {
        return $this->iday;
    }

    /**
     * {@inheritDoc}
     */
    public function setIday(?string $iday)
    {
        $this->iday = $iday;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getInppointMaxday(): ?string
    {
        return $this->inppointMaxday;
    }

    /**
     * {@inheritDoc}
     */
    public function setInppointMaxday(?string $inppointMaxday)
    {
        $this->inppointMaxday = $inppointMaxday;

        return $this;
    }
}

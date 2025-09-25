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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetDurationOrderTotal;

use Plugin\AceClient43\AceServices\Model\Dependency\Good;

/**
 * Model for Total
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class TotalModel implements TotalModelInterface
{
    use Good\GkbnTrait;

    /** @var ?int 伝票合計 */
    protected ?int $dentotal = null;

    /**
     * {@inheritDoc}
     */
    public function getDentotal(): ?int
    {
        return $this->dentotal;
    }

    /**
     * {@inheritDoc}
     */
    public function setDentotal(?int $dentotal)
    {
        $this->dentotal = $dentotal;

        return $this;
    }
}

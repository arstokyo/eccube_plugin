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
 * Trait for 冷凍
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ReitouTrait
{
    /** @var ?int 冷凍 */
    protected ?int $reitou = null;

    /**
     * {@inheritDoc}
     */
    public function getReitou(): ?int
    {
        return $this->reitou;
    }

    /**
     * {@inheritDoc}
     */
    public function setReitou(?int $reitou)
    {
        $this->reitou = $reitou;

        return $this;
    }
}

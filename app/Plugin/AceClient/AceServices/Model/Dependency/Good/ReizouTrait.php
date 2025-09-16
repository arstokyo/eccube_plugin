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
 * Trait for 冷蔵
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ReizouTrait
{
    /** @var ?int 冷蔵 */
    protected ?int $reizou = null;

    /**
     * {@inheritDoc}
     */
    public function getReizou(): ?int
    {
        return $this->reizou;
    }

    /**
     * {@inheritDoc}
     */
    public function setReizou(?int $reizou)
    {
        $this->reizou = $reizou;

        return $this;
    }
}

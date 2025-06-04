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
 * Trait for 常温
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait JyouonTrait
{
    /** @var ?int 常温 */
    protected ?int $jyouon = null;

    /**
     * {@inheritDoc}
     */
    public function getJyouon(): ?int
    {
        return $this->jyouon;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyouon(?int $jyouon)
    {
        $this->jyouon = $jyouon;

        return $this;
    }
}

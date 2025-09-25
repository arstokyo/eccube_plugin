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

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for フリー項目区分
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait KubunTrait
{
    /** @var ?int フリー項目区分 */
    protected ?int $kubun = null;

    /**
     * {@inheritDoc}
     */
    public function getKubun(): ?int
    {
        return $this->kubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setKubun(?int $kubun)
    {
        $this->kubun = $kubun;

        return $this;
    }
}

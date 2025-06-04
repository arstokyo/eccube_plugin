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
 * Trait for 区分
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait KbnTrait
{
    /** @var ?int 区分 */
    protected ?int $kbn = null;

    /**
     * {@inheritDoc}
     */
    public function getKbn(): ?int
    {
        return $this->kbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setKbn(?int $kbn)
    {
        $this->kbn = $kbn;

        return $this;
    }
}

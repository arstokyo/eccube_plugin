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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tanka;

/**
 * Trait for 単価区分
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TankaKbnTrait
{
    /** @var ?int 単価区分 */
    protected ?int $tankakbn = null;

    /**
     * {@inheritDoc}
     */
    public function getTankakbn(): ?int
    {
        return $this->tankakbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setTankakbn(?int $tankakbn)
    {
        $this->tankakbn = $tankakbn;

        return $this;
    }
}

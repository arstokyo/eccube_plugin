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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Shukka;

/**
 * Trait for 出荷対象区分
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait SKbnTrait
{
    /** @var ?int 出荷対象区分 */
    protected ?int $skbn = null;

    /**
     * {@inheritDoc}
     */
    public function getSkbn(): ?int
    {
        return $this->skbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setSkbn(?int $skbn)
    {
        $this->skbn = $skbn;

        return $this;
    }
}

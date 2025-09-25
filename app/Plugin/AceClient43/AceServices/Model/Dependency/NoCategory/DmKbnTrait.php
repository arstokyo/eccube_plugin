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
 * Trait for DM区分
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait DmKbnTrait
{
    /** @var ?int DM区分 */
    protected ?int $dmkbn = null;

    /**
     * {@inheritDoc}
     */
    public function getDmkbn(): ?int
    {
        return $this->dmkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setDmkbn(?int $dmkbn)
    {
        $this->dmkbn = $dmkbn;

        return $this;
    }
}

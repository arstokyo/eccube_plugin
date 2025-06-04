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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Address;

/**
 * Trait for Adr
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait AdrTrait
{
    /** @var ?string 住所 */
    protected ?string $adr = null;

    /**
     * {@inheritDoc}
     */
    public function getAdr(): ?string
    {
        return $this->adr;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdr(?string $adr)
    {
        $this->adr = $adr;

        return $this;
    }
}

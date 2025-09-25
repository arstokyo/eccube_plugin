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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember;

/**
 * Trait for 納品先住所枝番
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait NadrTrait
{
    /** @var ?string 納品先住所枝番 */
    protected ?string $nadr = null;

    /**
     * {@inheritDoc}
     */
    public function getNadr(): ?string
    {
        return $this->nadr;
    }

    /**
     * {@inheritDoc}
     */
    public function setNadr(?string $nadr)
    {
        $this->nadr = $nadr;

        return $this;
    }
}

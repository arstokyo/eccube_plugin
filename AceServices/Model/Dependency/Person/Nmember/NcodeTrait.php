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
 * Trait for 納品先顧客コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait NcodeTrait
{
    /** @var ?string 納品先顧客コード */
    protected ?string $ncode = null;

    /**
     * {@inheritDoc}
     */
    public function getNcode(): ?string
    {
        return $this->ncode;
    }

    /**
     * {@inheritDoc}
     */
    public function setNcode(?string $ncode)
    {
        $this->ncode = $ncode;

        return $this;
    }
}

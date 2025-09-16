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
 * Trait for Has 請求先コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait IcodeTrait
{
    /** @var ?string 請求先コード */
    protected ?string $icode = null;

    /**
     * {@inheritDoc}
     */
    public function getIcode(): ?string
    {
        return $this->icode;
    }

    /**
     * {@inheritDoc}
     */
    public function setIcode(?string $icode)
    {
        $this->icode = $icode;

        return $this;
    }
}

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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for 請求先顧客コード
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ScodeTrait
{
    /** @var ?string 請求先顧客コード */
    protected ?string $scode = null;

    /**
     * {@inheritDoc}
     */
    public function getScode(): ?string
    {
        return $this->scode;
    }

    /**
     * {@inheritDoc}
     */
    public function setScode(?string $scode)
    {
        $this->scode = $scode;

        return $this;
    }
}

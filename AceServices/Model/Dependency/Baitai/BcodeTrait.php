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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Baitai;

/**
 * Trait for 媒体コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait BcodeTrait
{
    /** @var ?string 媒体コード */
    protected ?string $bcode = null;

    /**
     * Get 媒体コード
     *
     * @return ?string
     */
    public function getBcode(): ?string
    {
        return $this->bcode;
    }

    /**
     * Set 媒体コード
     *
     * @param ?string $bcode
     *
     * @return $this
     */
    public function setBcode(?string $bcode)
    {
        $this->bcode = $bcode;

        return $this;
    }
}

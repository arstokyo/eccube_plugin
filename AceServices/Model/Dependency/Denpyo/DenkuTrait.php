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
 * Trait for 伝票種類
 *
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
trait DenkuTrait
{
    /** @var ?string 伝票種類 */
    protected ?string $denku = null;

    /**
     * {@inheritDoc}
     */
    public function getDenku(): ?string
    {
        return $this->denku;
    }

    /**
     * {@inheritDoc}
     */
    public function setDenku(?string $denku)
    {
        $this->denku = $denku;

        return $this;
    }
}

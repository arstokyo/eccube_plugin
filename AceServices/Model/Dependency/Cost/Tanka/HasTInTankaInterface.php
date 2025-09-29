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
 * Interface for Has 税込み単価
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTInTankaInterface
{
    /**
     * Get 税込み単価
     *
     * @return float|null
     */
    public function getTintanka(): ?float;

    /**
     * Set 税込み単価
     *
     * @param string|null $tintanka
     *
     * @return $this
     */
    public function setTintanka(?string $tintanka);
}

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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Souryou;

/**
 * Interface for Has 送料合計
 *
 * @author Ars-Phuoc <v.t.nguyen@ar-system.co.jp>
 */
interface HasSouryouZnInterface
{
    /**
     * Get 送料合計
     *
     * @return ?float
     */
    public function getSouryouzn(): ?float;

    /**
     * Set 送料合計
     *
     * @param ?string $souryouzn
     *
     * @return $this
     */
    public function setSouryouzn(?string $souryouzn);
}

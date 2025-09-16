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
 * Interface for Has 送料
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasSouryouInterface
{
    /**
     * Get 送料
     *
     * @return ?float
     */
    public function getSouryou(): ?float;

    /**
     * Set 送料
     *
     * @param ?string $souryou
     *
     * @return $this
     */
    public function setSouryou(?string $souryou);
}

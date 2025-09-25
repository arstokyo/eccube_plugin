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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Genka;

/**
 * Interface for Has 原価
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasGenkaInterface
{
    /**
     * Get 原価
     *
     * @return float|null
     */
    public function getGenka(): ?float;

    /**
     * Set 原価
     *
     * @param string|null $genka
     *
     * @return $this
     */
    public function setGenka(?string $genka);
}

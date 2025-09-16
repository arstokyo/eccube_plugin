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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Teika;

/**
 * Interface for Has 定価
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTeikaInterface
{
    /**
     * Get 定価
     *
     * @return float|null
     */
    public function getTeika(): ?float;

    /**
     * Set 定価
     *
     * @param string|null $teika
     *
     * @return $this
     */
    public function setTeika(?string $teika);
}

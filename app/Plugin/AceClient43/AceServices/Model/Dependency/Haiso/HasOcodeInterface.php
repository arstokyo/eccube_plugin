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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Haiso;

/**
 * Interface for Has 配送伝票ID
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */
interface HasOcodeInterface
{
    /**
     * Get 配送伝票ID Ocode
     *
     * @return ?int
     */
    public function getOcode(): ?int;

    /**
     * Set 配送伝票ID Ocode
     *
     * @param ?int $code
     *
     * @return $this
     */
    public function setOcode(?int $code);
}

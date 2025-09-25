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
 * Interface for Has 伝票区分
 */
interface HasDenKbnInterface
{
    /**
     * Get 伝票区分
     *
     * @return ?string
     */
    public function getDenkbn(): ?string;

    /**
     * Set 伝票区分
     *
     * @param ?string $denkbn
     *
     * @return $this
     */
    public function setDenkbn(?string $denkbn);
}

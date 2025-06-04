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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Address;

/**
 * Interface for Has 郵便番号
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasZipInterface
{
    /**
     * Get 郵便番号
     *
     * @return string|null
     */
    public function getZip(): ?string;

    /**
     * Set 郵便番号
     *
     * @param string|null $zip
     *
     * @return $this
     */
    public function setZip(?string $zip);
}

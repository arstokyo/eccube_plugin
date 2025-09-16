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

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for 氏名
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasSimeiInterface
{
    /**
     * Get 氏名
     *
     * @return string|null
     */
    public function getSimei(): ?string;

    /**
     * Set 氏名
     *
     * @param string|null $simei
     *
     * @return $this
     */
    public function setSimei(?string $simei);

    public function getName1(): ?string;

    public function getName2(): ?string;
}

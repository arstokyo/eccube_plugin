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
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasCountInterface
{
    /**
     * 合計件数
     *
     * @return int|null
     */
    public function getCount(): ?int;

    /**
     * 合計件数
     *
     * @param int|null $count
     *
     * @return static
     */
    public function setCount(?int $count): static;
}

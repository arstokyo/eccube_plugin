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
 * Interface for Has 配送希望時間コード
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasHtimeInterface
{
    /**
     * Get 配送希望時間コード
     *
     * @return ?int
     */
    public function getHtime(): ?int;

    /**
     * Set 配送希望時間コード
     *
     * @param ?int $htime
     *
     * @return $this
     */
    public function setHtime(?int $htime);
}

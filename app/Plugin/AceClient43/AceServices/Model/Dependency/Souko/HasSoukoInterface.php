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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Souko;

/**
 * Interface for Has 倉庫コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasSoukoInterface
{
    /**
     * Get 倉庫コード
     *
     * @return string|null
     */
    public function getSouko(): ?string;

    /**
     * Set 倉庫コード
     *
     * @param string|null $souko
     *
     * @return $this
     */
    public function setSouko(?string $souko);
}

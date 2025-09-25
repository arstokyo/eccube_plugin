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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Message;

/**
 * Interface for Has 結果
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasResultInterface
{
    /**
     * Get 結果
     */
    public function getResult(): ?string;

    /**
     * Set 結果
     *
     * @param ?string $result
     *
     * @return $this
     */
    public function setResult(?string $result);
}

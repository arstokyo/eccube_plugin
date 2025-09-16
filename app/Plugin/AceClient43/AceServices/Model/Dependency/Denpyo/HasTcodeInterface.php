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
 * Interface for Has 担当者コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTcodeInterface
{
    /**
     * Get 担当者コード
     *
     * @return ?string
     */
    public function getTcode(): ?string;

    /**
     * Set 担当者コード
     *
     * @param ?string $tcode
     *
     * @return $this
     */
    public function setTcode(?string $tcode);
}

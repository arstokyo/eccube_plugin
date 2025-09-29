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
 * Interface for Has パスワード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasPassWdInterface
{
    /**
     * Get パスワード
     *
     * @return ?string パスワード
     */
    public function getPasswd(): ?string;

    /**
     * Set パスワード
     *
     * @param ?string $passwd パスワード
     *
     * @return $this
     */
    public function setPasswd(?string $passwd);
}

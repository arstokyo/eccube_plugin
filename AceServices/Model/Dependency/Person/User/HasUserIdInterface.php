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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person\User;

/**
 * Interface for Has ユーザーID
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasUserIdInterface
{
    /**
     * Get ユーザーID
     *
     * @return ?string ユーザーID
     */
    public function getUserid(): ?string;

    /**
     * Set ユーザーID
     *
     * @param ?string $userId ユーザーID
     *
     * @return $this
     */
    public function setUserid(?string $userId);
}

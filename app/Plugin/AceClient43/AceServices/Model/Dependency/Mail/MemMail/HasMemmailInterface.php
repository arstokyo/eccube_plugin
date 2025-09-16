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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Mail\MemMail;

interface HasMemmailInterface
{
    /**
     * Get メールアドレス
     *
     * @return MemMailModel|null メールアドレス
     */
    public function getMemmail(): ?MemMailModel;

    /**
     * Set メールアドレス
     *
     * @param MemMailModel|null $memmail メールアドレス
     *
     * @return $this
     */
    public function setMemmail(?MemMailModel $memmail);
}

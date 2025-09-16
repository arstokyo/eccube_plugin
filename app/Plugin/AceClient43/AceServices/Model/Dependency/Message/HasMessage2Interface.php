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
 * Interface for Has エラーメッセージ2
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasMessage2Interface
{
    /**
     * Get エラーメッセージ2
     */
    public function getMessage2(): ?string;

    /**
     * Set エラーメッセージ2
     *
     * @param ?string $message2
     *
     * @return $this
     */
    public function setMessage2(?string $message2);
}

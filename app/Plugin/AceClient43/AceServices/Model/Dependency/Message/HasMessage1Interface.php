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
 * Interface for Has エラーメッセージ1
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasMessage1Interface
{
    /**
     * Get エラーメッセージ1
     */
    public function getMessage1(): ?string;

    /**
     * Set エラーメッセージ1
     *
     * @param ?string $message1
     *
     * @return $this
     */
    public function setMessage1(?string $message1);
}

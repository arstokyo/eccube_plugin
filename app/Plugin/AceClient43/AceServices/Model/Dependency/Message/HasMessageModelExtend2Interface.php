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

interface HasMessageModelExtend2Interface
{
    /**
     * Get エラーメッセージ
     *
     * @return MessageModelExtend2Interface
     */
    public function getMessage(): MessageModelExtend2Interface;

    /**
     * Set エラーメッセージ
     *
     * @param MessageModelExtend2 $message
     *
     * @return $this
     */
    public function setMessage(MessageModelExtend2 $message);
}

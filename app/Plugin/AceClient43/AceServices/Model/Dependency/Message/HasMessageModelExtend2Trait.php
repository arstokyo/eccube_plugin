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

trait HasMessageModelExtend2Trait
{
    /**
     * エラーメッセージ
     *
     * @var MessageModelExtend2
     */
    protected MessageModelExtend2 $Message;

    /**
     * {@inheritDoc}
     */
    public function getMessage(): MessageModelExtend2Interface
    {
        return $this->Message;
    }

    /**
     * {@inheritDoc}
     */
    public function setMessage(MessageModelExtend2 $message)
    {
        $this->Message = $message;

        return $this;
    }
}

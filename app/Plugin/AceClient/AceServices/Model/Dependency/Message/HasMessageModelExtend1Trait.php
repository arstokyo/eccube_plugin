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

trait HasMessageModelExtend1Trait
{
    /**
     * エラーメッセージ
     *
     * @var MessageModelExtend1
     */
    protected MessageModelExtend1 $Message;

    /**
     * {@inheritDoc}
     */
    public function getMessage(): MessageModelExtend1Interface
    {
        return $this->Message;
    }

    /**
     * {@inheritDoc}
     */
    public function setMessage(MessageModelExtend1 $message)
    {
        $this->Message = $message;

        return $this;
    }
}

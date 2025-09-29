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

trait HasMessageModelTrait
{
    /**
     * エラーメッセージ
     *
     * @var MessageModel
     */
    protected MessageModel $Message;

    /**
     * {@inheritDoc}
     */
    public function getMessage(): MessageModelInterface
    {
        return $this->Message;
    }

    /**
     * {@inheritDoc}
     */
    public function setMessage(MessageModel $message)
    {
        $this->Message = $message;

        return $this;
    }
}

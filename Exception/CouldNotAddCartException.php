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

namespace Plugin\AceClient43\Exception;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelExtend1Interface;
use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;

class CouldNotAddCartException extends AceApiMessageException
{
    /**
     * CouldNotAddCartException constructor.
     *
     * @param HasMessageModelInterface|HasMessageModelExtend1Interface|null $messageModel APIレスポンスのメッセージモデル
     * @param \Throwable|null $previous 前の例外
     */
    public function __construct(
        $messageModel = null,
        ?\Throwable $previous = null,
    ) {
        parent::__construct(
            '通販Aceにカートを追加できませんでした',
            $messageModel,
            $previous
        );
    }
}

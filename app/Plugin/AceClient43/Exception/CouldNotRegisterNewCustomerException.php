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

class CouldNotRegisterNewCustomerException extends AceClientBaseException
{
    /**
     * CouldNotRegisterNewCustomerException constructor.
     *
     * @param string $message  Exception message.
     * @param \Throwable|null $previous Previous exception.
     */
    public function __construct(string $message = '新しい顧客登録できませんでした', ?\Throwable $previous = null)
    {
        parent::__construct($message, $previous);
    }
}

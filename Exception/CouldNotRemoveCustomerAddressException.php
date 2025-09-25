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

class CouldNotRemoveCustomerAddressException extends AceClientBaseException
{
    /**
     *　顧客住所を削除できませんでした。
     *
     * @param string $message
     * @param \Throwable|null $previous
     */
    public function __construct(string $message = '顧客住所を削除できませんでした。', ?\Throwable $previous = null)
    {
        parent::__construct($message, $previous);
    }
}

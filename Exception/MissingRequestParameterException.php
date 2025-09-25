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

class MissingRequestParameterException extends AceClientBaseException
{
    /**
     * Constructor
     *
     * @param string $nullParam Null Parameter Name
     * @param int $code
     * @param \Throwable $previous
     */
    public function __construct(string $nullParam, ?\Throwable $previous = null)
    {
        parent::__construct(sprintf('The following parameter is missing: %s', $nullParam), $previous);
    }
}

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

class AceDateTimeCreateFailedException extends AceClientBaseException
{
    /**
     * Constructor
     *
     * @param string $message Error message
     * @param string|int  $code
     * @param \Throwable $previous
     */
    public function __construct($dateTime, ?\Throwable $previous = null)
    {
        parent::__construct(sprintf('Could not create AceDateTime from given string (%s)', $dateTime), $previous);
    }
}

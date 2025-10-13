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

namespace Plugin\AceClient43\Events;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\EventDispatcher\Event;

class HelperPreImportProductEvent extends Event
{
    public array $request;

    public LoggerInterface $logger;

    public array $options;

    /**
     * @param array $request
     * @param LoggerInterface $logger
     * @param array $options
     */
    public function __construct(array $request, LoggerInterface $logger, array $options)
    {
        $this->request = $request;
        $this->logger = $logger;
        $this->options = $options;
    }
}

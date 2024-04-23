<?php

namespace Plugin\AceClient\Utils\Log;

use Psr\Log\LoggerInterface;
use Psr\Log\AbstractLogger;

class SoapXmlLogger extends AbstractLogger implements LoggerInterface
{
    public function log($level, $message, array $context = [])
    {
        $message = sprintf('[%s] %s', $level, $message);
        error_log($message);
    }

}

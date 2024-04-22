<?php

namespace Plugin\AceClient\Utils\HttpClient;

use Psr\Log\LoggerInterface;
use Psr\Log\AbstractLogger;
use Psr\Log\LoggerTrait;

class SoapXmlLogger extends AbstractLogger implements LoggerInterface
{
    public function log($level, $message, array $context = [])
    {
        $message = sprintf('[%s] %s', $level, $message);
        error_log($message);
    }
}

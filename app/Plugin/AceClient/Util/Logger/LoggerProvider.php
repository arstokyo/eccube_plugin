<?php

namespace Plugin\AceClient\Util\Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Provider for Logger.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class LoggerProvider
{

    /** @var NullLogger $nullLogger */
    private NullLogger $nullLogger;

    private LoggerInterface $logger;

    /**
     * LoggerProvider constructor.
     * 
     * @param LoggerInterface $logger Logger.
     */
    public function __construct
    (
        LoggerInterface $logger
    )
    {
        $this->logger = $logger;
        $this->nullLogger = LoggerFactory::makeLoggerByClassName(LoggerFactory::NULL_LOGGER_CLASS);
    }

    /**
     * Get the logger.
     * 
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * Get the null logger.
     * 
     * @return NullLogger
     */
    public function getNullLogger(): NullLogger
    {
        return $this->nullLogger;
    }
}
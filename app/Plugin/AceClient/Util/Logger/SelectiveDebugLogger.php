<?php

namespace Plugin\AceClient43\Util\Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

/**
 * Selective Debug Logger - Controls debug log output at runtime
 *
 * This logger wraps the actual logger and provides the ability to enable/disable
 * debug logging at runtime. All other log levels (info, warning, error, etc.) are
 * always passed through to the underlying logger.
 *
 * Usage:
 * - $logger->setDebugEnabled(false) to suppress debug logs
 * - $logger->setDebugEnabled(true) to enable debug logs
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class SelectiveDebugLogger implements LoggerInterface
{
    use LoggerTrait;

    private LoggerInterface $logger;
    private bool $debugEnabled;

    /**
     * @param LoggerInterface $logger The actual logger to wrap
     * @param bool $defaultDebugEnabled Default state for debug logging
     */
    public function __construct(LoggerInterface $logger, bool $defaultDebugEnabled = true)
    {
        $this->logger = $logger;
        $this->debugEnabled = $defaultDebugEnabled;
    }

    /**
     * Enable or disable debug logging
     *
     * @param bool $enabled True to enable debug logs, false to suppress them
     *
     * @return void
     */
    public function setDebugEnabled(bool $enabled): void
    {
        $this->debugEnabled = $enabled;
    }

    /**
     * Check if debug logging is currently enabled
     *
     * @return bool
     */
    public function isDebugEnabled(): bool
    {
        return $this->debugEnabled;
    }

    /**
     * {@inheritDoc}
     *
     * Debug logs are only written if debug logging is enabled
     */
    public function debug($message, array $context = []): void
    {
        if ($this->debugEnabled) {
            $this->logger->debug($message, $context);
        }
    }

    /**
     * {@inheritDoc}
     *
     * Info logs always pass through
     */
    public function info($message, array $context = []): void
    {
        $this->logger->info($message, $context);
    }

    /**
     * {@inheritDoc}
     *
     * Notice logs always pass through
     */
    public function notice($message, array $context = []): void
    {
        $this->logger->notice($message, $context);
    }

    /**
     * {@inheritDoc}
     *
     * Warning logs always pass through
     */
    public function warning($message, array $context = []): void
    {
        $this->logger->warning($message, $context);
    }

    /**
     * {@inheritDoc}
     *
     * Error logs always pass through
     */
    public function error($message, array $context = []): void
    {
        $this->logger->error($message, $context);
    }

    /**
     * {@inheritDoc}
     *
     * Critical logs always pass through
     */
    public function critical($message, array $context = []): void
    {
        $this->logger->critical($message, $context);
    }

    /**
     * {@inheritDoc}
     *
     * Alert logs always pass through
     */
    public function alert($message, array $context = []): void
    {
        $this->logger->alert($message, $context);
    }

    /**
     * {@inheritDoc}
     *
     * Emergency logs always pass through
     */
    public function emergency($message, array $context = []): void
    {
        $this->logger->emergency($message, $context);
    }

    /**
     * {@inheritDoc}
     *
     * Generic log method - respects debug filtering
     */
    public function log($level, $message, array $context = []): void
    {
        // If it's a debug level and debug is disabled, skip it
        if ($level === 'debug' && !$this->debugEnabled) {
            return;
        }

        $this->logger->log($level, $message, $context);
    }
}

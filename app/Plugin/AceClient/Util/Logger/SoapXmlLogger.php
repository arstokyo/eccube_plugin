<?php

namespace Plugin\AceClient43\Util\Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\AbstractLogger;
use Eccube\Request\Context;
use Symfony\Contracts\Service\Attribute\Required;

/**
 * SoapXmlLogger
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class SoapXmlLogger extends AbstractLogger implements LoggerInterface
{
    private Context $context;
    private LoggerInterface $logger;
    private LoggerInterface $frontLogger;
    private LoggerInterface $adminLogger;

    /**
     * {@inheritDoc}
     */
    public function log($level, $message, array $context = [])
    {
        if ($this->context->isAdmin()) {
            $this->adminLogger->log($level, $message, $context);
        } elseif ($this->context->isFront()) {
            $this->frontLogger->log($level, $message, $context);
        } else {
            $this->logger->log($level, $message, $context);
        }
    }

    /**
     * Set Logger
     *
     * @param LoggerInterface $logger Logger instance.
     */
    #[Required]
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Set Front Logger
     *
     * @param LoggerInterface $logger Logger instance.
     */
    #[Required]
    public function setFrontLogger(LoggerInterface $logger)
    {
        $this->frontLogger = $logger;
    }

    /**
     * Set Admin Logger
     *
     * @param LoggerInterface $logger Logger instance.
     */
    #[Required]
    public function setAdminLogger(LoggerInterface $logger)
    {
        $this->adminLogger = $logger;
    }

    /**
     * Set Context
     *
     * @param Context $context Context instance.
     */
    #[Required]
    public function setContext(Context $context)
    {
        $this->context = $context;
    }

}

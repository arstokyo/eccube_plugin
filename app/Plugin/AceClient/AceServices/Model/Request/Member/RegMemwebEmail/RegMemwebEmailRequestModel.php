<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemwebEmail;

use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Class RegMemwebEmailRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class RegMemwebEmailRequestModel extends RequestModelAbstract implements RegMemwebEmailRequestModelInterface
{
    use Mail\MailTrait,
        NoCategory\SyidTrait,
        NoCategory\MbidTrait;

    const XML_NODE_NAME = 'regMemwebEmail';

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->syid) { throw new MissingRequestParameterException($this->compilePropertyName('syid')); };
        if (!$this->mbid) { throw new MissingRequestParameterException($this->compilePropertyName('mbid')); };
        if (!$this->mail) { throw new MissingRequestParameterException($this->compilePropertyName('mail')); };
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }

}
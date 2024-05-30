<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetPassword;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\Dependency\Mail;


/**
 * Class GetPassword Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetPasswordRequestModel extends RequestModelAbstract implements GetPasswordRequestModelInterface
{
    const XML_NODE_NAME = 'getPassword';

    use NoCategory\IdTrait,
        Mail\MailTrait;

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
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
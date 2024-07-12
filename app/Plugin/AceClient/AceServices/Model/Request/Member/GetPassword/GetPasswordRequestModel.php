<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetPassword;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\Mail;


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
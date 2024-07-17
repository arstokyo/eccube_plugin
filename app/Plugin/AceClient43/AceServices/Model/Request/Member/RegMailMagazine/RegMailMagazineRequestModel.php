<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\RegMailMagazine;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Mail;

/**
 * Class RegMailMagazineRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class RegMailMagazineRequestModel extends RequestModelAbstract implements RegMailMagazineRequestModelInterface
{
    use NoCategory\IdTrait,
        Mail\MailTrait,
        NoCategory\KbnTrait;

    const XML_NODE_NAME = 'regMailMagazine';

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
        if (null === $this->kbn) { throw new MissingRequestParameterException($this->compilePropertyName('kbn')); };
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
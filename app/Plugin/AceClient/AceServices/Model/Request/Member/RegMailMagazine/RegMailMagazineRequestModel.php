<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMailMagazine;

use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Mail;

/**
 * Class RegMailMagazineRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class RegMailMagazineRequestModel extends RequestModelAbstract implements RegMailMagazineRequestModelInterface
{
    use NoCategory\IdTrait,
        Mail\MailTrait;
    const XML_NODE_NAME = 'regMailMagazine';

    /** @var ?int $kbn 区分 */
    protected ?int $kbn = null;

    /**
    * {@inheritDoc}
    */
    public function getKbn(): ?int
    {
        return $this->kbn;
    }

    /**
    * {@inheritDoc}
    */
    public function setKbn(?int $kbn)
    {
        $this->kbn = $kbn;
        return $this;
    }

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
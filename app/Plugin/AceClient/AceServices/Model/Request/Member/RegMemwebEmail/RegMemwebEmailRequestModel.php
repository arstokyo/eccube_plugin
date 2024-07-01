<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemwebEmail;

use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Plugin\AceClient\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class RegMemwebEmailRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class RegMemwebEmailRequestModel extends RequestModelAbstract implements RegMemwebEmailRequestModelInterface
{
    use Mail\MailTrait;

    const XML_NODE_NAME = 'regMemwebEmail';

    /** @var ?int $syid 通販AceシステムID */
    protected ?int $syid = null;

    /** @var ?string $mbid 顧客ID */
    protected ?string $mbid = null;

    /**
     * {@inheritDoc}
     */
    public function getSyid(): ?int
    {
        return $this->syid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSyid(?int $syid)
    {
        $this->syid = $syid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMbid(): ?string
    {
        return $this->mbid;
    }

    /**
     * {@inheritDoc}
     */
    public function setMbid(?string $mbid)
    {
        $this->mbid = $mbid;
        return $this;
    }

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
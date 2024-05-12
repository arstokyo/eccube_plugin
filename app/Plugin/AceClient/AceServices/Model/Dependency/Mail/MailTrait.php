<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail;

/**
 * Trait for メール
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait MailTrait
{

    /** @var ?string $mail メール */
    protected ?string $mail = null;

    /**
     * {@inheritDoc}
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * {@inheritDoc}
     */
    public function setMail(?string $mail)
    {
        $this->mail = $mail;
        return $this;
    }
}
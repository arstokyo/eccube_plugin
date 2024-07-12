<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Mail;


/**
 * Trait for MailAdress
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait MailAdressTrait
{
    /** @var ?string $mailadress メールアドレス */
    protected ?string $mailadress = null;

    /**
     * {@inheritDoc}
     */
    public function getMailadress(): ?string
    {
        return $this->mailadress;
    }

    /**
     * {@inheritDoc}
     */
    public function setMailadress(?string $mailadress)
    {
        $this->mailadress = $mailadress;
        return $this;
    }
}
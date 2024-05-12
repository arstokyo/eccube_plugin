<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail;

use Symfony\Component\Serializer\Annotation\SerializedName;

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
<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail\MailJyuden;

/**
 * Class For MailJyudenModelLevel2
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MailJyudenModelLevel2 extends MailJyudenModelLevel1 implements MailJyudenModelLevel2Interface
{

    /** @var ?int $mailkbn メール区分 */
    protected ?int $mailkbn = null;

    /** @var ?string $jbikou 受注メールコメント */
    protected ?string $jbikou = null;

    /** @var ?string $sbikou 出荷メールコメント */
    protected ?string $sbikou = null;

    /**
     * {@inheritDoc}
     */
    public function getMailkbn(): ?int
    {
        return $this->mailkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setMailkbn(?int $mailkbn): static
    {
        $this->mailkbn = $mailkbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getJbikou(): ?string
    {
        return $this->jbikou;
    }

    /**
     * {@inheritDoc}
     */
    public function setJbikou(?string $jbikou): static
    {
        $this->jbikou = $jbikou;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSbikou(): ?string
    {
        return $this->sbikou;
    }

    /**
     * {@inheritDoc}
     */
    public function setSbikou(?string $sbikou): static
    {
        $this->sbikou = $sbikou;
        return $this;
    }
}
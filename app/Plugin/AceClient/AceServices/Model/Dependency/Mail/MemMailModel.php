<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail;

class MemMailModel implements MemMailModelInterface
{
    use MailTrait;

    /** @var ?int $dmailkbn */
    protected ?int $dmailkbn;

    /** @var ?int $idx */
    protected ?int $idx;

    /**
     * {@inheritDoc}
     *
     */
    public function getDmailkbn(): ?int
    {
        return $this->dmailkbn;
    }

    /**
     * {@inheritDoc}
     *
     */
    public function setDmailkbn(?int $dmailkbn): static
    {
        $this->dmailkbn = $dmailkbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     *
     */
    public function getIdx(): ?int
    {
        return $this->idx;
    }

    /**
     * {@inheritDoc}
     *
     */
    public function setIdx(?int $idx): static
    {
        $this->idx = $idx;
        return $this;
    }

}
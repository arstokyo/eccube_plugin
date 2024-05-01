<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail;

class MemMailModel implements MemMailModelInterface
{
    /** @var ?string $mail */
    protected ?string $mail;
    
    /** @var ?int $dmailkbn */
    protected ?int $dmailkbn;

    /** @var ?int $idx */
    protected ?int $idx;

    /**
     * {@inheritDoc}
     * 
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setMail(?string $mail): self
    {
        $this->mail = $mail;
        return $this;
    }

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
    public function setDmailkbn(?int $dmailkbn): self
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
    public function setIdx(?int $idx): self
    {
        $this->idx = $idx;
        return $this;
    }
    
}
<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Mail\MemMail;

use Plugin\AceClient43\AceServices\Model\Dependency\Mail\MailTrait;

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
    public function setDmailkbn(?int $dmailkbn)
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
    public function setIdx(?int $idx)
    {
        $this->idx = $idx;
        return $this;
    }

}
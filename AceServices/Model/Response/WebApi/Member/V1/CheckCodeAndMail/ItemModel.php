<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Member\V1\CheckCodeAndMail;

class ItemModel implements ItemModelInterface
{
    protected ?string $mcode;

    protected ?string $mail;

    protected bool $exist;

    public function getMcode(): ?string
    {
        return $this->mcode;
    }

    public function setMcode(?string $mcode): self
    {
        $this->mcode = $mcode;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getExist(): bool
    {
        return $this->exist;
    }

    public function setExist(bool $exist): self
    {
        $this->exist = $exist;

        return $this;
    }
}

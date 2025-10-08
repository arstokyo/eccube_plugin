<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Member\V1\CheckCodeAndMail;

class ItemModel implements ItemModelInterface
{
    protected string $checked;

    protected bool $exist;

    public function getChecked(): string
    {
        return $this->checked;
    }

    public function setChecked(string $checked): self
    {
        $this->checked = $checked;

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

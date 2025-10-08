<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Member\V1\CheckCodeAndMail;

interface ItemModelInterface
{
    /**
     * @return string
     */
    public function getChecked(): string;

    /**
     * @param string
     */
    public function setChecked(string $checked): self;

    /**
     * @return bool
     */
    public function getExist(): bool;

    /**
     * @param bool
     */
    public function setExist(bool $exist): self;
}

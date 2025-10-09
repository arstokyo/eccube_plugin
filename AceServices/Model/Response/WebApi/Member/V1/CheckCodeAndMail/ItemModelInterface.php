<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Member\V1\CheckCodeAndMail;

interface ItemModelInterface
{
    /**
     * @return string
     */
    public function getMcode(): ?string;

    /**
     * @param string
     */
    public function setMcode(?string $mcode): self;

    /**
     * @return string
     */
    public function getMail(): ?string;

    /**
     * @param string
     */
    public function setMail(string $mail): self;

    /**
     * @return bool
     */
    public function getExist(): bool;

    /**
     * @param bool
     */
    public function setExist(bool $exist): self;
}

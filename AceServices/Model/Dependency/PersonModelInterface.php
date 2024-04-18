<?php

namespace Plugin\AceClient\AceServices\Model\Dependency;

use Plugin\AceCLient\AceServices\Model;

interface PersonModelInterface
{
    /**
     * Get 顧客コード
     * 
     * @return string
     */
    public function getPersonCode(): string;

    /**
     * Set 顧客コード
     * 
     * @param string $code
     * @return Model\Dependency\PersonModelInterface
     */
    public function setPersonCode(string $code): self;
}
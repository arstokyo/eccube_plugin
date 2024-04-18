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
    public function getCode(): string;

    /**
     * Set 顧客コード
     * 
     * @param string $code
     * @return Model\Dependency\PersonModelInterface
     */
    public function setCode(string $code): self;
}
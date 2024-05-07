<?php

namespace  Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Request\Member\Dependency\NmemberModelInterface as ParentModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel2Interface;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\HasThreeBikouInterface;

interface NmemberModelInterface extends ParentModelInterface, PersonLevel2Interface, HasThreeBikouInterface
{
    /**
     * Get 住所区分
     * 
     * @return ?int
     */
    public function getBetu(): ?int;

    /**
     * Set 住所区分
     * 
     * @param ?int $betu
     */
    public function setBetu(?int $betu);

    /**
     * Get Fax番号
     * 
     * @return ?string
     */
    public function getFax(): ?string;

    /**
     * Set Fax番号
     * 
     * @param ?string $fax
     */
    public function setFax(?string $fax);
}
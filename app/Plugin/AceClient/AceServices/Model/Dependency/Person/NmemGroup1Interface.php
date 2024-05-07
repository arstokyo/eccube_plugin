<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

use Plugin\AceClient\AceServices\Model\Dependency\Person\NmemberInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel1Interface;
use Plugin\AceClient\AceServices\Model\Dependency\Address\HasFourAdrInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\HasThreeAdrBikouInterface;

/**
 * Interface for NmemGroup1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface NmemGroup1Interface extends NmemberInterface, PersonLevel1Interface, 
                                      HasFourAdrInterface, HasThreeAdrBikouInterface
{

    /**
     * Get 氏名
     * 
     * @return string|null
     */
    public function getAdrName(): ?string;

    /**
     * Set 氏名
     * 
     * @param string|null $adrName
     */
    public function setAdrName(?string $adrName);

    /**
     * Get 郵便番号
     * 
     * @return string|null
     */
    public function getZip(): ?string;

    /**
     * Set 郵便番号
     * 
     * @param string|null $zip
     */
    public function setZip(?string $zip);

    /**
     * Get 電話
     * 
     * @return string|null
     */
    public function getTel(): ?string;

    /**
     * Set 電話
     * 
     * @param string|null $tel
     */
    public function setTel(?string $tel);

    /**
     * Get Fax
     * 
     * @return string|null
     */
    public function getFax(): ?string;

    /**
     * Set Fax
     * 
     * @param string|null $fax
     */
    public function setFax(?string $fax);

}
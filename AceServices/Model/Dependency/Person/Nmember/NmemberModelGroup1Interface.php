<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person\Nmember;

use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel1Interface;
use Plugin\AceClient\AceServices\Model\Dependency\Address;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\HasThreeAdrBikouInterface;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Interface for NmemberModelGroup1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface NmemberModelGroup1Interface extends NmemberModelInterface, PersonLevel1Interface, 
                                              Address\HasFourAdrInterface, HasThreeAdrBikouInterface,
                                              PhoneAndPC\HasTelInterface, PhoneAndPC\HasFaxInterface,
                                              Address\HasZipInterface
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

}
<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

use Plugin\AceClient\AceServices\Model\Dependency\Person\NmemberInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel1Interface;
use Plugin\AceClient\AceServices\Model\Dependency\Address\HasFourAdrInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\HasThreeAdrBikouInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for NmemGroup1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface NmemGroup1Interface extends NmemberInterface, PersonLevel1Interface, 
                                      HasFourAdrInterface, HasThreeAdrBikouInterface,
                                      NoCategory\HasTelInterface, NoCategory\HasFaxInterface,
                                      NoCategory\HasZipInterface
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
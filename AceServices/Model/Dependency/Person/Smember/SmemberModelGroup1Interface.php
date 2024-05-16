<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person\Smember;

use Plugin\AceClient\AceServices\Model\Dependency\Person;
use Plugin\AceClient\AceServices\Model\Dependency\Address;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\HasThreeAdrBikouInterface;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Interface for SmemberModelGroup1
 * 
 * @author kmorino
 */
interface SmemberModelGroup1Interface extends SmemberModelInterface,
                                              Person\PersonLevel1Interface, Person\PersonLevel2Interface, Person\PersonLevel4Interface, Person\PersonLevel5Interface,
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
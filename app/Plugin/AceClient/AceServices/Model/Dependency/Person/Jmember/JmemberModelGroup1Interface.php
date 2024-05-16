<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person\Jmember;

use Plugin\AceClient\AceServices\Model\Dependency\Person;
use Plugin\AceClient\AceServices\Model\Dependency\Address;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\HasThreeAdrBikouInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Reminder;

/**
 * Interface for JmemberModelGroup1
 * 
 * @author kmorino
 */
interface JmemberModelGroup1Interface extends JmemberModelInterface, 
                                              Person\PersonLevel1Interface, Person\PersonLevel2Interface, Person\PersonLevel4Interface, Person\PersonLevel5Interface, Person\PersonLevel6Interface, 
                                              Address\HasFourAdrInterface, HasThreeAdrBikouInterface,
                                              Address\HasZipInterface,
                                              NoCategory\HasPassWdInterface,
                                              Reminder\HasSevenRemindersInterface
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
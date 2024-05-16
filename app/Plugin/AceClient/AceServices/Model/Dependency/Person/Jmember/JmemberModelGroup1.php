<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person\Jmember;

use Plugin\AceClient\AceServices\Model\Dependency\Address;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\ThreeAdrBikouTrait;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Person;
use Plugin\AceClient\AceServices\Model\Dependency\Reminder;

/**
 * Class For Jmem Model Group1
 * 
 * @author kmorino
 */
class JmemberModelGroup1 extends JmemberModel implements JmemberModelGroup1Interface
{
    use Person\PersonLevel1Trait,
        Person\PersonLevel2Trait,
        Person\PersonLevel4Trait,
        Person\PersonLevel5Trait,
        Person\PersonLevel6Trait,
        Address\FourAdrTrait,
        ThreeAdrBikouTrait,
        Address\ZipTrait,
        NoCategory\PassWdTrait,
        Reminder\SevenRemindersTrait;

    /** @var ?string $adrName 氏名 */
    protected ?string $adrName = null;

    /**
     * {@inheritDoc}
     */
    public function getAdrName(): string|null
    {
        return $this->adrName;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdrName(?string $adrName)
    {
        $this->adrName = $adrName;
        return $this;
    }

}
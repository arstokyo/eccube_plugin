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
    use Person\PersonLevel6ExtractTrait,
        Address\FourAdrTrait,
        ThreeAdrBikouTrait,
        Address\ZipTrait,
        NoCategory\PassWdTrait;

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
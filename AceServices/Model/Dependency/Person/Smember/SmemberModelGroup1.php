<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person\Smember;

use Plugin\AceClient\AceServices\Model\Dependency\Address;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\ThreeAdrBikouTrait;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Person;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Class For Smem Model Group1
 * 
 * @author kmorino
 */
class SmemberModelGroup1 extends SmemberModel implements SmemberModelGroup1Interface
{
    use Person\PersonLevel1Trait,
        Person\PersonLevel2Trait,
        Person\PersonLevel4Trait,
        Person\PersonLevel5Trait,
        Address\FourAdrTrait,
        ThreeAdrBikouTrait,
        PhoneAndPC\TelTrait,
        PhoneAndPC\FaxTrait,
        Address\ZipTrait;

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
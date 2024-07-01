<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person\Nmember;

use Plugin\AceClient\AceServices\Model\Dependency\Address;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\ThreeAdrBikouTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Person;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Class For Nmem Model Group1
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class NmemberModelGroup1 extends NmemberModel implements NmemberModelGroup1Interface
{
    use Person\PersonLevel1Trait,
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
    public function getAdrName(): ?string
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
<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

use Plugin\AceClient\AceServices\Model\Dependency\Person\NmemberAbstract;
use Plugin\AceClient\AceServices\Model\Dependency\Address\FourAdrTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\ThreeAdrBikouTrait;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Class For Nmem Model Group1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class NmemGroup1 extends NmemberAbstract implements NmemGroup1Interface
{
    use PersonLevel1Trait,
        FourAdrTrait,
        ThreeAdrBikouTrait,
        NoCategory\TelTrait,
        NoCategory\FaxTrait,
        NoCategory\ZipTrait;

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
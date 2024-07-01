<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs\GetHaisouAdrsModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\ThreeAdrBikouTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel3ExtractTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Address\FourCdvAdrTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Address\FourAdrTrait;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\KanaTrait;

/**
 * Class GetPointRequestModel
 *
 * @author kmorino
 */

class GetHaisouAdrsModel implements GetHaisouAdrsModelInterface
{
    use PersonLevel3ExtractTrait,
        ThreeAdrBikouTrait,
        FourCdvAdrTrait,
        FourAdrTrait,
        KanaTrait;

    /** @var string $cnvname 氏名 */
    private ?string $cnvname = null;

    /**
     * {@inheritDoc}
     */
    public function getCnvName(): ?string
    {
        return $this->cnvname;
    }

    /**
     * {@inheritDoc}
     */
    public function setCnvName(?string $cnvname)
    {
        $this->cnvname = $cnvname;
    }

}
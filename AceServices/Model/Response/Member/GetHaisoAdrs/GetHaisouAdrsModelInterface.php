<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel3ExtractInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Address\HasFourCdvAdrInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Address\HasFourAdrInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\HasThreeAdrBikouInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\HasKanaInterface;

/**
 * Interface GetHaisoAdrsModelResponseInterface
 *
 * @author kmorino
 */

interface GetHaisouAdrsModelInterface extends PersonLevel3ExtractInterface, HasFourCdvAdrInterface,
                                              HasKanaInterface, HasFourAdrInterface,
                                              HasThreeAdrBikouInterface
{

    /**
     * Set 氏名
     *
     * @param ?string $cnvname
     */
    public function setCnvName(?string $cnvname);

    /**
     * Get 氏名
     *
     * @param ?string $cnvname
     */
    public function getCnvName(): ?string;

}

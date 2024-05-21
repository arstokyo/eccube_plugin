<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person\Jmember;

use Plugin\AceClient\AceServices\Model\Dependency\Person;
use Plugin\AceClient\AceServices\Model\Dependency\Address;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\HasThreeAdrBikouInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for JmemberModelGroup1
 *
 * @author kmorino
 */
interface JmemberModelGroup1Interface extends JmemberModelInterface,
                                              Person\PersonLevel6ExtractInterface,
                                              Address\HasFourAdrInterface, HasThreeAdrBikouInterface,
                                              Address\HasZipInterface,
                                              NoCategory\HasPassWdInterface
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
     * @return $this
     */
    public function setAdrName(?string $adrName): static;

}
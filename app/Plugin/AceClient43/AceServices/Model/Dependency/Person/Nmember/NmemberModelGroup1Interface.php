<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember;

use Plugin\AceClient43\AceServices\Model\Dependency\Person\PersonLevel1Interface;
use Plugin\AceClient43\AceServices\Model\Dependency\Address;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou\HasThreeAdrBikouInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Interface for NmemberModelGroup1
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface NmemberModelGroup1Interface extends NmemberModelInterface, PersonLevel1Interface,
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
     * @return $this
     */
    public function setAdrName(?string $adrName);

}
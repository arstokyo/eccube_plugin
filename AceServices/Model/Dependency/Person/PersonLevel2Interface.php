<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

use Plugin\AceClient\AceServices\Model\Dependency\Address\HasFourAdrInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface For PersonLevel1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface PersonLevel2Interface extends HasFourAdrInterface, NoCategory\HasSimeiInterface,
                                        NoCategory\HasKanaInterface, NoCategory\HasZipInterface, 
                                        NoCategory\HasTelInterface
{
   
}
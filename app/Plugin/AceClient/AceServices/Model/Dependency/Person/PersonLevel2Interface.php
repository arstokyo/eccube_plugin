<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

use Plugin\AceClient\AceServices\Model\Dependency\Address;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Interface For PersonLevel1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface PersonLevel2Interface extends Address\HasFourAdrInterface, NoCategory\HasSimeiInterface,
                                        NoCategory\HasKanaInterface, Address\HasZipInterface, 
                                        PhoneAndPC\HasTelInterface
{
   
}
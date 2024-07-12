<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person;

use Plugin\AceClient43\AceServices\Model\Dependency\Address;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

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
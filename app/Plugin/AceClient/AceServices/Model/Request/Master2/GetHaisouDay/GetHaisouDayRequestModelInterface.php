<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master2\GetHaisouDay;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Souko;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\Address;

/**
 * Interface for Get Haisou Day Request Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface GetHaisouDayRequestModelInterface extends RequestModelInterface,
                                        NoCategory\HasIdInterface,
                                        Souko\HasSoukoInterface,
                                        Haiso\HasHcodeInterface,
                                        Address\HasZipInterface
{

}
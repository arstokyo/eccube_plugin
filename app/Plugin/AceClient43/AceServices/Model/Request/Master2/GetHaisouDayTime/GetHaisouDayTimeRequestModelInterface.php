<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master2\GetHaisouDayTime;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Souko;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\Address;

/**
 * Interface GetHaisouDayTime Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetHaisouDayTimeRequestModelInterface extends RequestModelInterface,
                                                        NoCategory\HasIdInterface,
                                                        Souko\HasSoukoInterface,
                                                        Haiso\HasHcodeInterface,
                                                        Address\HasZipInterface
{
}

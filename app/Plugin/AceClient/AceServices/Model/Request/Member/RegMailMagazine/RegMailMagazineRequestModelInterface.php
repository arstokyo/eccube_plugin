<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMailMagazine;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Mail;

/**
 * Interface RegMailMagazine Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface RegMailMagazineRequestModelInterface extends RequestModelInterface,
                                                       NoCategory\HasIdInterface,
                                                       Mail\HasMailInterface,
                                                       NoCategory\HasKbnInterface
{
}
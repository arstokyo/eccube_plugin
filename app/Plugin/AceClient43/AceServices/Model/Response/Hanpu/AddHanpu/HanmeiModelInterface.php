<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Hanmei;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\GiftAndCampaign;

/**
 * Interface for HanmeiModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HanmeiModelInterface extends NoCategory\HasIdInterface,
                                       NoCategory\HasSessIdInterface,
                                       Day\HasSdateInterface,
                                       Hanmei\HanmeiModelBaseInterface,
                                       GiftAndCampaign\HasCKbnInterface
{
}
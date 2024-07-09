<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\AddHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Hanmei;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;

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
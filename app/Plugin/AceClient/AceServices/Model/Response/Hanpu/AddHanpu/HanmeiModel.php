<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\AddHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Hanmei;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;
use Plugin\AceClient\AceServices\Model\Dependency\Day;


/**
 * Class for HanmeiModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HanmeiModel implements HanmeiModelInterface
{
    use NoCategory\IdTrait,
        NoCategory\SessIdTrait,
        Hanmei\HanmeiModelBaseTrait,
        GiftAndCampaign\CKbnTrait,
        Day\SdateTrait;
}
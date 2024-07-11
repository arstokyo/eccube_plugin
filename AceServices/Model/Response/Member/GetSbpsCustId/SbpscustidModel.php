<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetSbpsCustId;

use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Card;

/**
 * Model for Sbpscustid
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class SbpscustidModel implements SbpscustidModelInterface
{
    use Day\DayTrait,
        NoCategory\MbidTrait,
        Card\CedaTrait,
        NoCategory\CustidTrait;
}
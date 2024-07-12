<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\UpdateSbpsCustId;

use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Card;

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
<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Day;


/**
 * Trait for DayModelGroup1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait DayModelGroup1Trait 
{
    use DayTrait,
        YdayTrait,
        SdayTrait,
        UdayTrait,
        NdayTrait;
}
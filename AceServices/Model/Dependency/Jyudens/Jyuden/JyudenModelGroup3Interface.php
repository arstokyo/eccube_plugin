<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyuden;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Jyuden Model Group3
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface JyudenModelGroup3Interface extends JyudenModelGroup2Interface,
                                             NoCategory\HasSessIdInterface,
                                             Denpyo\HasMemIdInterface
{
}
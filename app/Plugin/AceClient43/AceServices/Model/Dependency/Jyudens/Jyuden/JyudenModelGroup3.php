<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyuden;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Jyuden Model Group3
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class JyudenModelGroup3 extends JyudenModelGroup2 implements JyudenModelGroup3Interface
{
    use NoCategory\SessIdTrait,
        Denpyo\MemIdTrait;
}
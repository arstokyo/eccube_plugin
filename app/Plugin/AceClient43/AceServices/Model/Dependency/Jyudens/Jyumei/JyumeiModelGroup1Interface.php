<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Zaiko;

/**
 * Interface for JyumeiModelGroup1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface JyumeiModelGroup1Interface extends JyumeiModelBaseInterface,
                                             Zaiko\HasIgnoreZaikoInterface,
                                             Zaiko\HasChoseiZaikoInterface,
                                             Cost\Tax\HasTaxKbnInterface,
                                             Cost\Teika\HasTeikaInterface,
                                             Cost\HasRituInterface,
                                             Cost\Genka\HasGenkaInterface
{
}
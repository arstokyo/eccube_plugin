<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Zaiko;

/**
 * Model for Jyumei Group1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class JyumeiModelGroup1 implements JyumeiModelGroup1Interface
{
    use JyumeiModelBaseTrait;
    use Zaiko\IgnoreZaikoTrait;
    use Zaiko\ChoseiZaikoTrait;
    use Cost\Tax\TaxKbnTrait;
    use Cost\Teika\TeikaTrait;
    use Cost\RituTrait;
    use Cost\Genka\GenkaTrait;
}

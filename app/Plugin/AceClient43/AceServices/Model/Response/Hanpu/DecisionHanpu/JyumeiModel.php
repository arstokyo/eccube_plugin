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

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens;

/**
 * Class for JyumeiModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class JyumeiModel extends Jyudens\Jyumei\JyumeiModelGroup4 implements JyumeiModelInterface
{
    use Cost\Teika\TeikaTrait;
    use Cost\RituTrait;
    use Cost\Genka\GenkaTrait;
}

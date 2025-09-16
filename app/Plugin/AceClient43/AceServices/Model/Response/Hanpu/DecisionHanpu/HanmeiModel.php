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

use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Hanmei;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class for HanmeiModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HanmeiModel implements HanmeiModelInterface
{
    use Hanmei\HanmeiModelBaseTrait;
    use NoCategory\IdTrait;
    use Denpyo\DennoTrait;
}

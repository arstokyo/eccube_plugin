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

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\DecisionCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo\DennoTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyusub\JyusubModelBaseTrait;

/**
 * Model for Jyusub
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyusubModel implements JyusubModelInterface
{
    use JyusubModelBaseTrait;
    use DennoTrait;
}

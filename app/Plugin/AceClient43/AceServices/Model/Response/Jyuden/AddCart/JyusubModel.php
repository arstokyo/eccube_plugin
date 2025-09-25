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

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Card\GMO;
use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyusub\JyusubModelGroup1;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Model for Jyusub
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyusubModel extends JyusubModelGroup1 implements JyusubModelInterface
{
    use GMO\GMODpsOrderIdTrait;
    use GMO\GMODpsTIdTrait;
    use NoCategory\SessIdTrait;
}

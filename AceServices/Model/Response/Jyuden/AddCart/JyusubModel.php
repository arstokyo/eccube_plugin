<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyusub\JyusubModelGroup1;
use Plugin\AceClient\AceServices\Model\Dependency\Card\GMO;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Model for Jyusub
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyusubModel extends JyusubModelGroup1 implements JyusubModelInterface
{
    use GMO\GMODpsOrderIdTrait,
        GMO\GMODpsTIdTrait,
        NoCategory\SessIdTrait;
}
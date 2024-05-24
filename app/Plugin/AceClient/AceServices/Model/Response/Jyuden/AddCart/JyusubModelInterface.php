<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyusub\JyusubModelGroup1Interface;
use Plugin\AceClient\AceServices\Model\Dependency\Card\GMO;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Jyusub
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyusubModelInterface extends JyusubModelGroup1Interface,
                                       GMO\HasGMODpsOrderIdInterface,
                                       GMO\HasGMODpsTIdInterface,
                                       NoCategory\HasSessIdInterface
{
    
}
<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyusub\JyusubModelGroup1Interface;
use Plugin\AceClient43\AceServices\Model\Dependency\Card\GMO;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

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
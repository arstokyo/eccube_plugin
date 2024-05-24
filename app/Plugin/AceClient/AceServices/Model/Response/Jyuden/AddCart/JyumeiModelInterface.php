<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyumei;
use Plugin\AceClient\AceServices\Model\Dependency\Zaiko;

/**
 * Interface for JyumeiModel
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyumeiModelInterface extends Jyumei\JyumeiModelGroup2Interface,
                                       Jyumei\JyumeiModelGroup3Interface,
                                       Zaiko\HasIgnoreZaikoInterface,
                                       Zaiko\HasZaikoInterface
{

}
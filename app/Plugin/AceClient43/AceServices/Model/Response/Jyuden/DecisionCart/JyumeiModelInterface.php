<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\DecisionCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei\JyumeiModelGroup4Interface;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;

/**
 * Interface for JyumeiModel
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyumeiModelInterface extends JyumeiModelGroup4Interface, 
                                        Cost\Teika\HasTeikaInterface, 
                                        Cost\Genka\HasGenkaInterface,
                                        Cost\HasRituInterface
{

}

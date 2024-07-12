<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;

/**
 * Interface for JyumeiModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface JyumeiModelInterface extends Jyudens\Jyumei\JyumeiModelGroup4Interface,
                                       Cost\Teika\HasTeikaInterface,
                                       Cost\HasRituInterface,
                                       Cost\Genka\HasGenkaInterface
{
}
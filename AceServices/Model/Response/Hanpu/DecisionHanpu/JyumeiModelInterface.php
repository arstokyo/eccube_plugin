<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Jyudens;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;

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
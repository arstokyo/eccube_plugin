<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;

/**
 * Class for JyumeiModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class JyumeiModel extends Jyudens\Jyumei\JyumeiModelGroup4 implements JyumeiModelInterface
{
    use Cost\Teika\TeikaTrait,
        Cost\RituTrait,
        Cost\Genka\GenkaTrait;
}
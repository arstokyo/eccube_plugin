<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden\DecisionCart;

use Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyumei\JyumeiModelGroup4;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;

/**
 * Model for Jyumei
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyumeiModel extends JyumeiModelGroup4 implements JyumeiModelInterface
{
    use Cost\Teika\TeikaTrait,
        Cost\Genka\GenkaTrait,
        Cost\RituTrait;
}
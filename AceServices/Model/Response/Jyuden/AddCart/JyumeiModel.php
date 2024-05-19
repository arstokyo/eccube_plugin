<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyumei;
use Plugin\AceClient\AceServices\Model\Dependency\Zaiko;

/**
 * Model for Jyumei
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyumeiModel extends Jyumei\JyumeiModelGroup2 implements JyumeiModelInterface
{
    use Jyumei\JyumeiModelGroup3Trait,
        Zaiko\ZaikoTrait,
        Zaiko\IgnoreZaikoTrait;
}
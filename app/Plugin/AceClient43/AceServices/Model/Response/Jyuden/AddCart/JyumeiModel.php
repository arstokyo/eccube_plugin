<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei;
use Plugin\AceClient43\AceServices\Model\Dependency\Zaiko;

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
<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyuden\JyudenModelGroup2;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\SessIdTrait;

/**
 * Model for Jyuden Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyudenModel extends JyudenModelGroup2 implements JyudenModelInterface
{
    use SessIdTrait;
}
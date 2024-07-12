<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyuden\JyudenModelGroup2;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\SessIdTrait;

/**
 * Model for Jyuden Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyudenModel extends JyudenModelGroup2 implements JyudenModelInterface
{
    use SessIdTrait;
}
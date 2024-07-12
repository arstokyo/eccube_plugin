<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Decision Cart Request Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface DecisionCartRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface, NoCategory\HasSessIdInterface
{

}
<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\DeleteHaisoAdrs;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface DeleteHaisoAdrsRequestInterface
 *
 * @author kmorino
 */
interface DeleteHaisoAdrsRequestModelInterface extends RequestModelInterface,
                                               NoCategory\HasIdInterface,
                                               NoCategory\HasMcodeInterface,
                                               NoCategory\HasEdaInterface
{
}
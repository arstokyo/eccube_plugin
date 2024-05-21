<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\DeleteHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

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
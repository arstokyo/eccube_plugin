<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetHaisoAdrsRequestInterface
 *
 * @author k-morino
 */
interface GetHaisoAdrsRequestInterface extends RequestModelInterface,
                                                NoCategory\HasIdInterface,
                                                NoCategory\HasMcodeInterface
{
}
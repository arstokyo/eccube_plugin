<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Get Haiso Adrs Request Model
 *
 * @author k-morino
 */
interface GetHaisoAdrsRequestModelInterface extends RequestModelInterface,
                                                NoCategory\HasIdInterface,
                                                NoCategory\HasMcodeInterface
{
}
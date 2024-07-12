<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetMemberMcode;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetMemberMcode Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetMemberMcodeRequestModelInterface extends RequestModelInterface,
                                                    NoCategory\HasIdInterface,
                                                    NoCategory\HasMcodeInterface
{
}
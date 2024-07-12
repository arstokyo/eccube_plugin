<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetMemberName;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetMemberName Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetMemberNameRequestModelInterface extends RequestModelInterface,
                                                     NoCategory\HasSyidInterface,
                                                     NoCategory\HasMbidInterface
{
}
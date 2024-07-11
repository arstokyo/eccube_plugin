<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetMemberName;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

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
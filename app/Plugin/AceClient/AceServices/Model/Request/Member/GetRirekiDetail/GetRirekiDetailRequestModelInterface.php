<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetRirekiDetail;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Interface GetRirekiDetailRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetRirekiDetailRequestModelInterface extends RequestModelInterface,
                                                 NoCategory\HasIdInterface,
                                                 Denpyo\HasDennoInterface,
                                                 Denpyo\HasDenkuInterface,
                                                 NoCategory\HasMcodeInterface
{
}
<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetRirekiDetail;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

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
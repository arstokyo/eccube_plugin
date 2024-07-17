<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetBaifile;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Baitai;

/**
 * Interface GetBaifile Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetBaifileRequestModelInterface extends RequestModelInterface,
                                                  NoCategory\HasIdInterface,
                                                  Baitai\HasBcodeInterface
{
}

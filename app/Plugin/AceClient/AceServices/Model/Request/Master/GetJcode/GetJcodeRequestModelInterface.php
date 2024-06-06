<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetJcode;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetJcode Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetJcodeRequestModelInterface extends RequestModelInterface,
                                                NoCategory\HasIdInterface
{
}

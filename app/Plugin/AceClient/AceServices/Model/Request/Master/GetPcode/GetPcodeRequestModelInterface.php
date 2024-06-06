<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetPcode;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetPcode Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetPcodeRequestModelInterface extends RequestModelInterface,
                                                NoCategory\HasIdInterface
{
}

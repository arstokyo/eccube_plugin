<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetSouko;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetSouko Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetSoukoRequestModelInterface extends RequestModelInterface,
                                                        NoCategory\HasIdInterface
{
}

<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetSbpsCustId;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetSbpsCustIdRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetSbpsCustIdRequestModelInterface extends RequestModelInterface,
                                                     NoCategory\HasSyidInterface,
                                                     NoCategory\HasMbidInterface
{
}
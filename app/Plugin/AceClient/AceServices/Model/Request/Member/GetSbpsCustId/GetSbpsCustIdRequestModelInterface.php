<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetSbpsCustId;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

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
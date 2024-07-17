<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\GetDeliveryInfo;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;

/**
 * Interface for GetDeliveryInfo Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetDeliveryInfoRequestModelInterface extends RequestModelInterface,
                                                       NoCategory\HasIdInterface,
                                                       Day\HasExecDateFromInterface,
                                                       Day\HasExecDateToInterface
{
}
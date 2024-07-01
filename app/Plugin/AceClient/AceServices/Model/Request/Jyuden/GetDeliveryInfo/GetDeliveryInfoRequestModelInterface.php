<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\GetDeliveryInfo;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Day;

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
<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\UpdateTaikai;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface UpdateTaikai Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface UpdateTaikaiRequestModelInterface extends RequestModelInterface,
                                                    NoCategory\HasIdInterface,
                                                    NoCategory\HasMcodeInterface,
                                                    NoCategory\HasTaikaiInterface
{
}
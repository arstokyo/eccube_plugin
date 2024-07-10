<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\UpdatePassword;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for MemwebModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemwebModelInterface extends NoCategory\HasPassWdInterface,
                                       NoCategory\HasMbidInterface
{
}
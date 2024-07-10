<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\UpdatePassword;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Model for MemwebModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemwebModel implements MemwebModelInterface
{
    use NoCategory\PassWdTrait,
        NoCategory\MbidTrait;
}

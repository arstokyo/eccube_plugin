<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\UpdateTaikai;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Model for Memweb
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemwebModel implements MemwebModelInterface
{
    use NoCategory\CodeTrait,
        NoCategory\TaikaiTrait;
}

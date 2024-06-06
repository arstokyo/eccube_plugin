<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetStaff;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Class StaffModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class StaffModel implements StaffModelInterface
{
    use NoCategory\CodeTrait,
        NoCategory\NameTrait;
}
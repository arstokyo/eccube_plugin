<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetMemberName;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Model for Member1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class Member1Model implements Member1ModelInterface
{
    use NoCategory\NameTrait,
        NoCategory\MbidTrait;
}

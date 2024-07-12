<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\User\UserIdTrait;

/**
 * Trait for Person Level 6
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PersonLevel6Trait
{
    use NoCategory\IcodeTrait, 
        NoCategory\TaikaiTrait,
        UserIdTrait;
}
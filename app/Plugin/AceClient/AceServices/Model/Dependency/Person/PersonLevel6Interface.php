<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

use Plugin\AceClient\AceServices\Model\Dependency\Person\User\HasUserIdInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Person Level 6
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface PersonLevel6Interface extends NoCategory\HasIcodeInterface,
                                NoCategory\HasTaikaiInterface, 
                                HasUserIdInterface
{
    
}
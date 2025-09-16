<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person;

use Plugin\AceClient43\AceServices\Model\Dependency\Address;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Trait for Person Level 2
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PersonLevel2Trait
{
    use Address\FourAdrTrait;
    use NoCategory\SimeiTrait;
    use NoCategory\KanaTrait;
    use Address\ZipTrait;
    use PhoneAndPC\TelTrait;
}

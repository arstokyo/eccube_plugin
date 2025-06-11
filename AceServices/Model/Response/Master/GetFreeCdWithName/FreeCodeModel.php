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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetFreeCdWithName;

use Plugin\AceClient43\AceServices\Model\Dependency\Bikou\HasThreeNotesInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou\ThreeNotesTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Free\FreeCdTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Free\HasFreeCdInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\HasNameInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\NameTrait;

/**
 * Class CalendarModel
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class FreeCodeModel implements HasThreeNotesInterface, HasNameInterface, HasFreeCdInterface
{
    use ThreeNotesTrait;

    use NameTrait;

    use FreeCdTrait;
}

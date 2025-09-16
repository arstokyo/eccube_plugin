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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Bikou\ThreeBikouTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember\NmemberModel as ParentModel;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\PersonLevel2ExtractTrait;

/**
 * Class for 納品先Model
 *
 * @author kmorino
 */
class NmemberModel extends ParentModel implements NmemberModelInterface
{
    use PersonLevel2ExtractTrait;
    use ThreeBikouTrait;
}

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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Mail\FiveMelmagaTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\PersonLevel6ExtractTrait;

/**
 * Jmem Model
 *
 * @author kmorino
 */
class JmemModel implements JmemModelInterface
{
    use PersonLevel6ExtractTrait;
    use FiveMelmagaTrait;
}

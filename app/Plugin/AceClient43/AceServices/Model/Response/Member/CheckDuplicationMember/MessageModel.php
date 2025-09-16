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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\CheckDuplicationMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Message;

/**
 * Class MessageModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MessageModel implements MessageModelInterface
{
    use Message\ResultTrait;
    use Message\Message1Trait;
}

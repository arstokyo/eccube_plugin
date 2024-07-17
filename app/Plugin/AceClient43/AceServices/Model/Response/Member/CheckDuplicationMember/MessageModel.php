<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\CheckDuplicationMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Message;

/**
 * Class MessageModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class MessageModel implements MessageModelInterface
{
    use Message\ResultTrait,
        Message\Message1Trait;
}
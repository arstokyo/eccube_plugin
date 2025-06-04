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

/**
 * Class for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemberModel implements MemberModelInterface
{
    /**
     * @var MessageModel message
     */
    private ?MessageModel $message = null;

    /**
     * {@inheritDoc}
     */
    public function getMessage(): ?MessageModel
    {
        return $this->message;
    }

    /**
     * {@inheritDoc}
     */
    public function setMessage(?MessageModel $message): void
    {
        $this->message = $message;
    }
}

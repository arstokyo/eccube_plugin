<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\CheckDuplicationMember;

/**
 * Class for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemberModel implements MemberModelInterface
{
    /**
     * @var MessageModel $message message
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
<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\CheckDuplicationMember;

/**
 * Interface for Member Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemberModelInterface
{
    /**
     * Get Message
     *
     * @return MessageModel
     */
    public function getMessage(): ?MessageModel;

    /**
     * Set Message
     *
     * @param MessageModel $message
     * @return void
     */
    public function setMessage(?MessageModel $message): void;
}
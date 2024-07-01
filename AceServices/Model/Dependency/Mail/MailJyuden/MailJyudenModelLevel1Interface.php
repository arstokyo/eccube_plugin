<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail\MailJyuden;

use Plugin\AceClient\AceServices\Model\Dependency\Mail;

/**
 * Interface For MailJyudenModelLevel1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MailJyudenModelLevel1Interface extends Mail\HasMailInterface
{

    /**
     * Get 注文コメント(お客様)
     *
     * @return ?string
     */
    public function getTbikou(): ?string;

    /**
     * Set 注文コメント(お客様)
     *
     * @param ?string $tbikou
     * @return $this
     */
    public function setTbikou(?string $tbikou);
}
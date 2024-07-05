<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpuNext;

use Plugin\AceClient\AceServices\Model\Dependency\Mail;

/**
 * Interface MailJyudenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MailJyudenModelInterface extends Mail\HasMailInterface
{
    /**
    * Get 伝票メール情報
    *
    * @return ?string
    */
    public function getTbikou(): ?string;

    /**
     * Set 伝票メール情報
     *
     * @param ?string $tbikou
     * @return $this
     */
    public function setTbikou(?string $tbikou): static;
}
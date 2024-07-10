<?php

namespace Plugin\AceClient\AceServices\Model\Response\Contact\RegContact;

use Plugin\AceClient\AceServices\Model\Dependency\Contact;

/**
 * Interface ContactModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface ContactModelInterface extends Contact\HasContactInterface
{
    /**
     * Get コンタクトID
     *
     * @return ?int
     */
    public function getConid(): ?int;

    /**
     * Set コンタクトID
     *
     * @param ?int $conid
     * @return $this
     */
    public function setConid(?int $conid);
}
<?php

namespace Plugin\AceClient\AceServices\Model\Response\Contact\RegContact;

use Plugin\AceClient\AceServices\Model\Dependency\Contact;

/**
 * Class ContactModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class ContactModel implements ContactModelInterface
{
    use Contact\ContactTrait;

    /** @var ?int $conid コンタクトID */
    protected ?int $conid = null;

    /**
     * {@inheritDoc}
     */
    public function getConid(): ?int
    {
        return $this->conid;
    }

    /**
     * {@inheritDoc}
     */
    public function setConid(?int $conid)
    {
        $this->conid = $conid;
        return $this;
    }
}
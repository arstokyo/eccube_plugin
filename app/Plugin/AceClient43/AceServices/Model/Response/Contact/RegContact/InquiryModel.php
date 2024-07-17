<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Contact\RegContact;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class InquiryModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class InquiryModel implements InquiryModelInterface
{
    use HasMessageModelTrait;

    /**
     * Contact
     *
     * @var ContactModel $contact
     */
    protected ?ContactModel $contact  = null;

    /**
     * Contactmei
     *
     * @var ContactmeiModel $contactmei
     */
    protected ?ContactmeiModel $contactmei  = null;

    /**
     * {@inheritDoc}
     */
    function getContact(): ?ContactModel
    {
        return $this->contact;
    }

    /**
    * {@inheritDoc}
    */
    function setContact(?ContactModel $contact): self
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    function getContactmei(): ?ContactmeiModel
    {
        return $this->contactmei;
    }

    /**
    * {@inheritDoc}
    */
    function setContactmei(?ContactmeiModel $contactmei): self
    {
        $this->contactmei = $contactmei;
        return $this;
    }
}
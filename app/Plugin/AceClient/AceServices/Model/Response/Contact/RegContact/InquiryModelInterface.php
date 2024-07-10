<?php

namespace Plugin\AceClient\AceServices\Model\Response\Contact\RegContact;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;

/**
 * Interface for InquiryModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface InquiryModelInterface extends HasMessageModelInterface
{
    /**
    * Get Contact
    *
    * @return ContactModel
    */
    public function getContact(): ?ContactModel;

    /**
     * Set Contact
     *
     * @param ContactModel $contact
     * @return self
     */
    public function setContact(?ContactModel $contact): self;

    /**
    * Get Contactmei
    *
    * @return ContactmeiModel
    */
    public function getContactmei(): ?ContactmeiModel;

    /**
     * Set Contactmei
     *
     * @param ContactmeiModel $contactmei
     * @return self
     */
    public function setContactmei(?ContactmeiModel $contactmei): self;
}
<?php

namespace Plugin\AceClient\AceServices\Model\Request\Contact\RegContact;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Prm\PrmModelInterface;

/**
 * Interface for InquiryPrmModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface InquiryPrmModelInterface extends PrmModelInterface
{
    /**
    * Get Contact
    *
    * @return Request\Contact\RegContact\ContactModel
    */
    public function getContact(): ?ContactModel;

    /**
     * Set Contact
     *
     * @param Request\Contact\RegContact\ContactModel $contact
     * @return self
     */
    public function setContact(?ContactModel $contact): self;

    /**
    * Get Contactmei
    *
    * @return Request\Contact\RegContact\ContactmeiModel
    */
    public function getContactmei(): ?ContactmeiModel;

    /**
     * Set Contactmei
     *
     * @param Request\Contact\RegContact\ContactmeiModel $contactmei
     * @return self
     */
    public function setContactmei(?ContactmeiModel $contactmei): self;
}
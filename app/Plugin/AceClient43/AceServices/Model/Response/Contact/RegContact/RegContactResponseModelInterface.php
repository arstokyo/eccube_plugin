<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Contact\RegContact;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

interface RegContactResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get Inquiry
     *
     * @return Response\Contact\RegContact\InquiryModel
     */
    public function getInquiry(): InquiryModelInterface;

    /**
     * Set Inquiry
     *
     * @param Response\Contact\RegContact\InquiryModel
     * @return self
     */
    public function setInquiry(InquiryModel $Inquiry): self;
}
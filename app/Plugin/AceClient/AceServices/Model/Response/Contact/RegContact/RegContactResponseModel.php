<?php

namespace Plugin\AceClient\AceServices\Model\Response\Contact\RegContact;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

class RegContactResponseModel extends ResponseModelAbtract implements RegContactResponseModelInterface
{
    /** @var InquiryModel $inquiry  */
    private InquiryModel $inquiry;

    /**
     * {@inheritDoc}
     */
    public function getInquiry(): InquiryModelInterface
    {
        return $this->inquiry;
    }

    /**
     * {@inheritDoc}
     */
    public function setInquiry(InquiryModel $inquiry): self
    {
        $this->inquiry = $inquiry;
        return $this;
    }
}
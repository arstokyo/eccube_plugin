<?php

namespace Plugin\AceClient\AceServices\Model\Request\Contact\RegContact;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

interface RegContactRequestModelInterface extends RequestModelInterface,
                                                  NoCategory\HasIdInterface
{
    /**
     * Set Inquiry
     *
     * @param Request\Contact\RegContact\InquiryPrmModel $prm
     * @return self
     */
    public function setPrm(InquiryPrmModel $prm): self;

    /**
     * Get Inquiry
     *
     * @return Request\Contact\RegContact\InquiryPrmModel
     */
    public function getPrm(): InquiryPrmModelInterface;
}
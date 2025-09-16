<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Response\Contact\RegContact;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

interface RegContactResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get Inquiry
     *
     * @return InquiryModel
     */
    public function getInquiry(): InquiryModelInterface;

    /**
     * Set Inquiry
     *
     * @param InquiryModel
     *
     * @return self
     */
    public function setInquiry(InquiryModel $Inquiry): self;
}

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

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

class RegContactResponseModel extends ResponseModelAbtract implements RegContactResponseModelInterface
{
    /** @var InquiryModel */
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

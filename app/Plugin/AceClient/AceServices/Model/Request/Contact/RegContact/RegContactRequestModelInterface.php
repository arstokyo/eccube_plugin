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

namespace Plugin\AceClient43\AceServices\Model\Request\Contact\RegContact;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

interface RegContactRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface
{
    /**
     * Set Inquiry
     *
     * @param InquiryPrmModel $prm
     *
     * @return self
     */
    public function setPrm(InquiryPrmModel $prm): self;

    /**
     * Get Inquiry
     *
     * @return InquiryPrmModel
     */
    public function getPrm(): InquiryPrmModelInterface;
}

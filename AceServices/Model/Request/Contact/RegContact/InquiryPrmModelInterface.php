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

use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelInterface;

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
     * @return ContactModel
     */
    public function getContact(): ?ContactModel;

    /**
     * Set Contact
     *
     * @param ContactModel $contact
     *
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
     *
     * @return self
     */
    public function setContactmei(?ContactmeiModel $contactmei): self;
}

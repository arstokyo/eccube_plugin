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
     * @var ContactModel
     */
    protected ?ContactModel $contact = null;

    /**
     * Contactmei
     *
     * @var ContactmeiModel
     */
    protected ?ContactmeiModel $contactmei = null;

    /**
     * {@inheritDoc}
     */
    public function getContact(): ?ContactModel
    {
        return $this->contact;
    }

    /**
     * {@inheritDoc}
     */
    public function setContact(?ContactModel $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getContactmei(): ?ContactmeiModel
    {
        return $this->contactmei;
    }

    /**
     * {@inheritDoc}
     */
    public function setContactmei(?ContactmeiModel $contactmei): self
    {
        $this->contactmei = $contactmei;

        return $this;
    }
}

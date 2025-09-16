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

use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelAbstract;

/**
 * Class InquiryPrmModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class InquiryPrmModel extends PrmModelAbstract implements InquiryPrmModelInterface
{
    public const PRM_NODE_NAME = 'inquiry';

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        // ignore
    }

    /**
     * {@inheritDoc}
     */
    public function fetchPrmNodeName(): string
    {
        return self::PRM_NODE_NAME;
    }
    /**
     * Contact
     *
     * @var ContactModel
     */
    protected ?ContactModel $contact = null;

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
     * Contactmei
     *
     * @var ContactmeiModel
     */
    protected ?ContactmeiModel $contactmei = null;

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

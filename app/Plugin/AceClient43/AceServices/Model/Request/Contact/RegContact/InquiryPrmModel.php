<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Contact\RegContact;

use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelAbstract;

/**
 * Class InquiryPrmModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class InquiryPrmModel extends PrmModelAbstract implements InquiryPrmModelInterface
{
    const PRM_NODE_NAME = 'inquiry';

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
     * @var ContactModel $contact
     */
    protected ?ContactModel $contact  = null;

    /**
     * {@inheritDoc}
     */
    function getContact(): ?ContactModel
    {
        return $this->contact;
    }

    /**
    * {@inheritDoc}
    */
    function setContact(?ContactModel $contact): self
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * Contactmei
     *
     * @var ContactmeiModel $contactmei
     */
    protected ?ContactmeiModel $contactmei  = null;

    /**
     * {@inheritDoc}
     */
    function getContactmei(): ?ContactmeiModel
    {
        return $this->contactmei;
    }

    /**
    * {@inheritDoc}
    */
    function setContactmei(?ContactmeiModel $contactmei): self
    {
        $this->contactmei = $contactmei;
        return $this;
    }
}
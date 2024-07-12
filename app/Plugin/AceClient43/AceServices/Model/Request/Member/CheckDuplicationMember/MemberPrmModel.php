<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\CheckDuplicationMember;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Address;
use Plugin\AceClient43\AceServices\Model\Dependency\Mail;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;
use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelAbstract;

/**
 * Class MemberPrmModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemberPrmModel extends PrmModelAbstract implements MemberPrmModelInterface
{
    use NoCategory\NameTrait,
        NoCategory\KanaTrait,
        Address\ZipTrait,
        Address\AdrTrait,
        Mail\MailTrait,
        PhoneAndPC\TelTrait;

    const PRM_NODE_NAME = 'member';

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
}
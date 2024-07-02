<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\CheckDuplicationMember;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Address;
use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;
use Plugin\AceClient\AceServices\Model\Request\Prm\PrmModelAbstract;

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
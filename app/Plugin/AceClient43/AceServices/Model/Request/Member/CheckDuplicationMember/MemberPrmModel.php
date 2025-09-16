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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\CheckDuplicationMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Address;
use Plugin\AceClient43\AceServices\Model\Dependency\Mail;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;
use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelAbstract;

/**
 * Class MemberPrmModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemberPrmModel extends PrmModelAbstract implements MemberPrmModelInterface
{
    use NoCategory\NameTrait;
    use NoCategory\KanaTrait;
    use Address\ZipTrait;
    use Address\AdrTrait;
    use Mail\MailTrait;
    use PhoneAndPC\TelTrait;

    public const PRM_NODE_NAME = 'member';

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

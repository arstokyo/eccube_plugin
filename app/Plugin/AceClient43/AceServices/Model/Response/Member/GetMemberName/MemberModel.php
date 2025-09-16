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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberName;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemberModel implements MemberModelInterface
{
    use HasMessageModelTrait;
    /**
     * Member
     *
     * @var Member1Model
     */
    protected ?Member1Model $member = null;

    /**
     * {@inheritDoc}
     */
    public function getMember(): ?Member1Model
    {
        return $this->member;
    }

    /**
     * {@inheritDoc}
     */
    public function setMember(?Member1Model $member): void
    {
        $this->member = $member;
    }
}

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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode;

use Plugin\AceClient43\AceServices\Model\Dependency\Mail\FiveMelmagaTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\PersonLevel6ExtractTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC\MobileIdTrait;
use Plugin\AceClient43\AceServices\Model\Request\Member\UpdateTaikai\UpdateTaikaiRequestModelInterface;

/**
 * Class for Member Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemberModel implements MemberModelInterface
{
    use PersonLevel6ExtractTrait;
    use FiveMelmagaTrait;
    use MobileIdTrait;

    /**
     *  入会中
     */
    public function isActiveMember(): bool
    {
        return $this->getTaikai() == UpdateTaikaiRequestModelInterface::TAIKAI_ACTIVE;
    }

    public function hasUserId(): bool
    {
        return !empty($this->getUserId());
    }
}

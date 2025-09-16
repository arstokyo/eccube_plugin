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

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpuNext;

use Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu\DetailModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu\HandenModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu\HanpuPrmModel as ParentModel;
use Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu\MailJyudenModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu\MemberModelInterface;

/**
 * Class HanpuPrmModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HanpuPrmModel extends ParentModel
{
    /**
     * @param MemberModel|null $member
     */
    public function setMember(?MemberModelInterface $member): self
    {
        return parent::setMember($member);
    }

    /**
     * @param HandenModel|null $handen
     */
    public function setHanden(?HandenModelInterface $handen): self
    {
        return parent::setHanden($handen);
    }

    /**
     * @param MailJyudenModel|null $mailjyuden
     */
    public function setMailjyuden(?MailJyudenModelInterface $mailjyuden): self
    {
        return parent::setMailjyuden($mailjyuden);
    }

    /**
     * @param DetailModel|null $detail
     */
    public function setDetail(?DetailModelInterface $detail): self
    {
        return parent::setDetail($detail);
    }
}

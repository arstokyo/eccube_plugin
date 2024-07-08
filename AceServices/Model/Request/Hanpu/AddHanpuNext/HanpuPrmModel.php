<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpuNext;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu\DetailModelInterface;
use Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu\HandenModelInterface;
use Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu\HanpuPrmModel as ParentModel;
use Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu\MailJyudenModelInterface;
use Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu\MemberModelInterface;

/**
 * Class HanpuPrmModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HanpuPrmModel extends ParentModel
{

    /**
     * @param Request\Hanpu\AddHanpuNext\MemberModel|null $member
     */
    public function setMember(?MemberModelInterface $member): self
    {
        return parent::setMember($member);
    }

    /**
    * @param Request\Hanpu\AddHanpuNext\HandenModel|null $handen
    */
    public function setHanden(?HandenModelInterface $handen): self
    {
        return parent::setHanden($handen);
    }

    /**
    * @param Request\Hanpu\AddHanpuNext\MailJyudenModel|null $mailjyuden
    */
    public function setMailjyuden(?MailJyudenModelInterface $mailjyuden): self
    {
        return parent::setMailjyuden($mailjyuden);
    }

    /**
    * @param Request\Hanpu\AddHanpuNext\DetailModel|null $detail
    */
    public function setDetail(?DetailModelInterface $detail): self
    {
        return parent::setDetail($detail);
    }

}
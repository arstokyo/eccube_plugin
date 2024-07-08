<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpuNext;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu\JmemberModelInterface;
use Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu\MemberModel as ParentModel;
use Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu\NmemberModelInterface;
use Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu\SmemberModelInterface;

class MemberModel extends ParentModel
{

    /**
     * @param Request\Hanpu\AddHanpu\JmemberModel|null $jmember
     */
    public function setJmember(?JmemberModelInterface $jmember): self
    {
        return parent::setJmember($jmember);
    }

    /**
     * @param Request\Hanpu\AddHanpu\NmemberModel|null $nmember
     */
    public function setNmember(?NmemberModelInterface $nmember): self
    {
        return parent::setNmember($nmember);
    }

    /**
     * @param Request\Hanpu\AddHanpu\SmemberModel|null $smember
     */
    public function setSmember(?SmemberModelInterface $smember): self
    {
        return parent::setSmember($smember);
    }
}
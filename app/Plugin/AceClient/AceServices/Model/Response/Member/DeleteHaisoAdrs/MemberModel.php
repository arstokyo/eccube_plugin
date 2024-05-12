<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\DeleteHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;
use Plugin\AceClient\AceServices\Model\Response\Member\DeleteHaisoAdrs\NmemberModel;

/**
 * Class MemberModel
 *
 * @author kmorino
 */

class MemberModel implements MemberModelInterface
{
    use HasMessageModelTrait;
    
    /**
     * Point
     *
     * @var NmemberModel $Nmember
     */
    protected ?NmemberModel $Nmember  = null;

    /**
     * {@inheritDoc}
     */
    function getNmember(): ?NmemberModel
    {
        return $this->Nmember;
    }

    /**
    * {@inheritDoc}
    */
    function setNmember(?NmemberModel $Nmember): void
    {
        $this->Nmember = $Nmember;
    }
}
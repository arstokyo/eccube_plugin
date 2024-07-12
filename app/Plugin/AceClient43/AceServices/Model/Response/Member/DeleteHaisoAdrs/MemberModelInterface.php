<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\DeleteHaisoAdrs;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\DeleteHaisoAdrs\NmemberModel;
use Plugin\AceClient43\AceServices\Model\Response;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface MemberModelInterface
 *
 * @author kmorino
 */

interface MemberModelInterface extends HasMessageModelInterface, AsListDenormalizableInterface
{
    /**
    * Get Nmember
    *
    * @return Response\Member\DeleteHaisoAdrs\NmemberModel[]|null
    */
    public function getNmember(): ?array;

    /**
     * Set Nmember
     *
     * @param Response\Member\DeleteHaisoAdrs\NmemberModel[]|null $Nmember
     * @return void
     */
    public function setNmember(?array $Nmember): void;
}
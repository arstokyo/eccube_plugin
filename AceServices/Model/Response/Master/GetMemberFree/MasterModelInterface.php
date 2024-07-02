<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetMemberFree;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MasterModelInterface extends HasMessageModelInterface,
                                       AsListDenormalizableInterface
{
    /**
    * Get MemberFree
    *
    * @return MemberFreeModel[]|null
    */
    public function getMemberFree(): ?array;

    /**
     * Set MemberFree
     *
     * @param MemberFreeModel[]|null $memberFree
     * @return void
     */
    public function setMemberFree(?array $memberFree): void;
}
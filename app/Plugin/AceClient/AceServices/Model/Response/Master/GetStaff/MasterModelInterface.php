<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetStaff;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;


/**
 * Interface for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MasterModelInterface extends HasMessageModelInterface,
                                       AsListDenormalizableInterface
{
    /**
    * Get Staff
    *
    * @return StaffModel[]|null
    */
    public function getStaff(): ?array;

    /**
     * Set Staff
     *
     * @param StaffModel[]|null $staff
     * @return void
     */
    public function setStaff(?array $staff): void;
}
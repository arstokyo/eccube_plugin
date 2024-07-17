<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetDurationOrderTotal;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;

/**
 * Interface for Member Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemberModelInterface extends HasMessageModelInterface
{
    /**
     * Get Total
     *
     * @return TotalModel
     */
    public function getTotal(): ?TotalModel;

    /**
     * Set Total
     *
     * @param TotalModel $total
     * @return void
     */
    public function setTotal(?TotalModel $total): void;
}
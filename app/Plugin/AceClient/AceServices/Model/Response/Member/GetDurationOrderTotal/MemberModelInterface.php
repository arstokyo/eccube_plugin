<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetDurationOrderTotal;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;

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
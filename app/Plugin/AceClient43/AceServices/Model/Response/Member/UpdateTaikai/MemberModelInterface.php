<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\UpdateTaikai;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;

/**
 * Interface for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemberModelInterface extends HasMessageModelInterface
{
    /**
    * Get Memweb
    *
    * @return MemwebModel
    */
    public function getMemweb(): ?MemwebModel;

    /**
     * Set Memweb
     *
     * @param MemwebModel $memweb
     * @return void
     */
    public function setMemweb(?MemwebModel $memweb): void;
}
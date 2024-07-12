<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBumon;

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
    * Get Bumon
    *
    * @return BumonModel[]|null
    */
    public function getBumon(): ?array;

    /**
     * Set Bumon
     *
     * @param BumonModel[]|null $bumon
     * @return void
     */
    public function setBumon(?array $bumon): void;
}
<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBumonFree;

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
    * Get BumonFree
    *
    * @return BumonFreeModel[]|null
    */
    public function getBumonFree(): ?array;

    /**
     * Set BumonFree
     *
     * @param BumonFreeModel[]|null $bumonFree
     * @return void
     */
    public function setBumonFree(?array $bumonFree): void;
}
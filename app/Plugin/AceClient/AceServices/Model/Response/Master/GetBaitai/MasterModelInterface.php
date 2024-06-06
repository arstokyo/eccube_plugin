<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetBaitai;

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
    * Get Baitai
    *
    * @return BaitaiModel[]|null
    */
    public function getBaitai(): ?array;

    /**
     * Set Baitai
     *
     * @param BaitaiModel[]|null $baitai
     * @return void
     */
    public function setBaitai(array|null $baitai): void;
}
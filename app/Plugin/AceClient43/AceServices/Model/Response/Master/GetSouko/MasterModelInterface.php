<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetSouko;

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
    * Get Souko
    *
    * @return SoukoModel[]|null
    */
    public function getSouko(): ?array;

    /**
     * Set Souko
     *
     * @param SoukoModel[]|null $souko
     * @return void
     */
    public function setSouko(?array $souko): void;
}
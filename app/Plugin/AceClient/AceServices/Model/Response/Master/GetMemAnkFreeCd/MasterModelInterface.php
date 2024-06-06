<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetMemAnkFreeCd;

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
    * Get FreeCd
    *
    * @return FreeCdModel[]|null
    */
    public function getFreeCd(): ?array;

    /**
     * Set FreeCd
     *
     * @param FreeCdModel[]|null $freeCd
     * @return void
     */
    public function setFreeCd(array|null $freeCd): void;
}
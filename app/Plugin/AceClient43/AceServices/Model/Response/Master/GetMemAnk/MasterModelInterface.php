<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetMemAnk;

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
    * Get MemAnk
    *
    * @return MemAnkModel[]|null
    */
    public function getMemAnk(): ?array;

    /**
     * Set MemAnk
     *
     * @param MemAnkModel[]|null $memAnk
     * @return void
     */
    public function setMemAnk(?array $memAnk): void;
}
<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetMemberFreeMemo;

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
    * Get FreeMemo
    *
    * @return FreeMemoModel[]|null
    */
    public function getFreeMemo(): ?array;

    /**
     * Set FreeMemo
     *
     * @param FreeMemoModel[]|null $freeMemo
     * @return void
     */
    public function setFreeMemo(?array $freeMemo): void;
}
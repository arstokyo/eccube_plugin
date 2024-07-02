<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetBumonFreemst;

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
    * Get Freemst
    *
    * @return FreemstModel[]|null
    */
    public function getFreemst(): ?array;

    /**
     * Set Freemst
     *
     * @param FreemstModel[]|null $freemst
     * @return void
     */
    public function setFreemst(?array $freemst): void;
}
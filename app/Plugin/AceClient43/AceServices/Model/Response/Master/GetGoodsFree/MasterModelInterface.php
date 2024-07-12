<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetGoodsFree;

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
    * Get GoodsFree
    *
    * @return GoodsFreeModel[]|null
    */
    public function getGoodsFree(): ?array;

    /**
     * Set GoodsFree
     *
     * @param GoodsFreeModel[]|null $goodsFree
     * @return void
     */
    public function setGoodsFree(?array $goodsFree): void;
}
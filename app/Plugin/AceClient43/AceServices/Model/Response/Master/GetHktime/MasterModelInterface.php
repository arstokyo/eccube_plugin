<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetHktime;

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
    * Get Hktime
    *
    * @return HktimeModel[]|null
    */
    public function getHktime(): ?array;

    /**
     * Set Hktime
     *
     * @param HktimeModel[]|null $hktime
     * @return void
     */
    public function setHktime(?array $hktime): void;
}
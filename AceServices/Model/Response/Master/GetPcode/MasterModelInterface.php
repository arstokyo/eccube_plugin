<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetPcode;

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
    * Get Pcode
    *
    * @return PcodeModel[]|null
    */
    public function getPcode(): ?array;

    /**
     * Set Pcode
     *
     * @param PcodeModel[]|null $pcode
     * @return void
     */
    public function setPcode(array|null $pcode): void;
}
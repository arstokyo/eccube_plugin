<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetJcode;

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
    * Get Jcode
    *
    * @return JcodeModel[]|null
    */
    public function getJcode(): ?array;

    /**
     * Set Jcode
     *
     * @param JcodeModel[]|null $jcode
     * @return void
     */
    public function setJcode(?array $jcode): void;
}
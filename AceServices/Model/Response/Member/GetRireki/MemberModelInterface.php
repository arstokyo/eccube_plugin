<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetRireki;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Rireki;
use Plugin\AceClient\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface for Login Member Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemberModelInterface extends HasMessageModelInterface,
                                       AsListDenormalizableInterface
{
    /**
     * Get Rireki
     *
     * @return Rireki\RirekiModelLevel1[]|null
     */
    public function getRireki(): ?array;

    /**
     * Set Rireki
     *
     * @param Rireki\RirekiModelLevel1[]|null $rireki
     * @return void
     */
    public function setRireki(array|null $rireki): void;
}
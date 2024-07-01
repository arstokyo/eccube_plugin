<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetRireki;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;
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
     * @return RirekiModel[]|null
     */
    public function getRireki(): ?array;

    /**
     * Set Rireki
     *
     * @param RirekiModel[]|null $rireki
     * @return void
     */
    public function setRireki(?array $rireki): void;
}
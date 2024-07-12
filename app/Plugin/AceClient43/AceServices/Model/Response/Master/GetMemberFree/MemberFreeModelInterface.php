<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetMemberFree;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for MemberFreeModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemberFreeModelInterface extends NoCategory\HasMbidInterface,
                                           NoCategory\HasKubunInterface
{
    /**
     * Get フリー内容
     *
     * @return ?string
     */
    public function getFree(): ?string;

    /**
     * Set フリー内容
     *
     * @param ?string $free
     * @return $this
     */
    public function setFree(?string $free);
}
<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetMemberFree;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for MemberFreeModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemberFreeModelInterface extends NoCategory\HasMbidInterface
{
    /**
     * Get フリー項目区分
     *
     * @return ?int
     */
    public function getKubun(): ?int;

    /**
     * Set フリー項目区分
     *
     * @param ?int $kubun
     * @return $this
     */
    public function setKubun(?int $kubun);

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
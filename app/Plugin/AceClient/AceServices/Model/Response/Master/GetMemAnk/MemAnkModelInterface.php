<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetMemAnk;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for MemAnkModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemAnkModelInterface extends NoCategory\HasMbidInterface,
                                       NoCategory\HasKubunInterface
{
    /**
     * Get 回答番号
     *
     * @return ?int
     */
    public function getAnsno(): ?int;

    /**
     * Set 回答番号
     *
     * @param ?int $ansno
     * @return $this
     */
    public function setAnsno(?int $ansno);

    /**
     * Get アンケートID
     *
     * @return ?string
     */
    public function getAnsid(): ?string;

    /**
     * Set アンケートID
     *
     * @param ?string $ansid
     * @return $this
     */
    public function setAnsid(?string $ansid);
}
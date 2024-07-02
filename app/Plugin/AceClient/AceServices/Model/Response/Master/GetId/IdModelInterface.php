<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetId;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for IdModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface IdModelInterface extends NoCategory\HasIdInterface
{
    /**
     * Get ID名
     *
     * @return ?string
     */
    public function getIdName(): ?string;

    /**
     * Set ID名
     *
     * @param ?string $idName
     * @return $this
     */
    public function setIdName(?string $idName);
}
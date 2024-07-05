<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu;

/**
 * Interface for DetailModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface DetailModelInterface
{
    /**
    * Get Hanmei
    *
    * @return HanmeiModel[]|null
    */
    public function getHanmei(): ?array;

    /**
     * Set Hanmei
     *
     * @param HanmeiModel[]|null $hanmei
     * @return self
     */
    public function setHanmei(?array $hanmei): self;
}
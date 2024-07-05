<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpuNext;

use Plugin\AceClient\AceServices\Model\Request;

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
    * @return Request\Hanpu\AddHanpuNext\HanmeiModel[]|null
    */
    public function getHanmei(): ?array;

    /**
     * Set Hanmei
     *
     * @param Request\Hanpu\AddHanpuNext\HanmeiModel[]|null $hanmei
     * @return self
     */
    public function setHanmei(?array $hanmei): self;
}
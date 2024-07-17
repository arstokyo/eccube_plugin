<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Request;

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
     * @param Request\Hanpu\AddHanpu\HanmeiModel[]|null $hanmei
     * @return self
     */
    public function setHanmei(?array $hanmei): self;
}
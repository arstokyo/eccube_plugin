<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpuNext;

/**
 * Class DetailModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class DetailModel implements DetailModelInterface
{
    /**
     * Hanmei
     *
     * @var HanmeiModel[]|null $hanmei
     */
    protected ?array $hanmei  = null;

    /**
     * {@inheritDoc}
     */
    function getHanmei(): ?array
    {
        return $this->hanmei;
    }

    /**
    * {@inheritDoc}
    */
    function setHanmei(?array $hanmei): self
    {
        $this->hanmei = $hanmei;
        return $this;
    }
}
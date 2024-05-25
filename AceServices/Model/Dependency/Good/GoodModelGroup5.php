<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Class for GoodModelGroup5
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GoodModelGroup5 implements GoodModelGroup5Interface
{
    use GdidTrait,
        NoCategory\NameTrait;

    /** @var ?int $jsuu 受注可能数 */
    protected ?int $jsuu = null;

    /**
     * {@inheritDoc}
     */
    public function getJsuu(): ?int
    {
        return $this->jsuu;
    }

    /**
     * {@inheritDoc}
     */
    public function setJsuu(?int $jsuu): static
    {
        $this->jsuu = $jsuu;
        return $this;
    }
}
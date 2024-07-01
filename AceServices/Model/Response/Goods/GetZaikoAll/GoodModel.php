<?php

namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetZaikoAll;

use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Class for GoodModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GoodModel implements GoodModelInterface
{
    use Good\GdidTrait,
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
    public function setJsuu(?int $jsuu)
    {
        $this->jsuu = $jsuu;
        return $this;
    }
}
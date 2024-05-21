<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Trait for ポイント種類
 *
 * @author kmorino
 */
trait PointKindTrait
{

    /** @var ?int $point ポイント */
    protected ?int $pointKind = null;

    /**
    * {@inheritDoc}
    */
    public function getPointKind(): ?int
    {
        return $this->pointKind;
    }

    /**
    * {@inheritDoc}
    */
    public function setPointKind(?int $pointKind): static
    {
        $this->point = $pointKind;
        return $this;
    }

}

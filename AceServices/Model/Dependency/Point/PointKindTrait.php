<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Trait for ポイント種類
 *
 * @author kmorino
 */
trait PointKindTrait
{

    /** @var ?int $pointkind ポイント */
    protected ?int $pointkind = null;

    /**
    * {@inheritDoc}
    */
    public function getPointkind(): ?int
    {
        return $this->pointkind;
    }

    /**
    * {@inheritDoc}
    */
    public function setPointkind(?int $pointkind)
    {
        $this->pointkind = $pointkind;
        return $this;
    }

}

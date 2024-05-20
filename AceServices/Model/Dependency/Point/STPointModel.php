<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

use Plugin\AceClient\AceServices\Model\Dependency\Point\STPointModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Point\PointTrait;
use Symfony\Component\Serializer\Annotation\SerializedName;



/**
 * Model for STPoint
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class STPointModel implements STPointModelInterface
{
    use PointTrait;

    /** @var string|int|null $iday ポイント算出日付 */
    protected string|int|null $iday = null;

    /** @var string|int|null $inppointMaxday 最新購入日 */
    protected string|int|null $inppointMaxday = null;

    /**
     * {@inheritDoc}
     */
    public function getIday(): string|int|null
    {
        return $this->iday;
    }

    /**
     * {@inheritDoc}
     */
    public function setIday(string|int|null $iday): static
    {
        $this->iday = $iday;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getInppointMaxday(): string|int|null
    {
        return $this->inppointMaxday;
    }

    /**
     * {@inheritDoc}
     */
    public function setInppointMaxday(string|int|null $inppointMaxday): static
    {
        $this->inppointMaxday = $inppointMaxday;
        return $this;
    }
}
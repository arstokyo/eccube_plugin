<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Point;

use Plugin\AceClient43\AceServices\Model\Dependency\Point\STPointModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Point\PointTrait;
use Symfony\Component\Serializer\Annotation\SerializedName;



/**
 * Model for STPoint
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class STPointModel implements STPointModelInterface
{
    use PointTrait;

    /** @var ?string $iday ポイント算出日付 */
    protected ?string $iday = null;

    /** @var ?string $inppointMaxday 最新購入日 */
    protected ?string $inppointMaxday = null;

    /**
     * {@inheritDoc}
     */
    public function getIday(): ?string
    {
        return $this->iday;
    }

    /**
     * {@inheritDoc}
     */
    public function setIday(?string $iday)
    {
        $this->iday = $iday;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getInppointMaxday(): ?string
    {
        return $this->inppointMaxday;
    }

    /**
     * {@inheritDoc}
     */
    public function setInppointMaxday(?string $inppointMaxday)
    {
        $this->inppointMaxday = $inppointMaxday;
        return $this;
    }
}
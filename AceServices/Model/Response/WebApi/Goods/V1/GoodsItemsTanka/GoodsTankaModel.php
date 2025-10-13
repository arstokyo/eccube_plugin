<?php

namespace Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GoodsItemsTanka;

use Plugin\AceClient43\AceServices\Model\Dependency\Good\GdidTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Good\HasGdidInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\Util\Converter\NumberConverter;

class GoodsTankaModel implements Cost\Tanka\HasTankaKbnInterface, Day\HasDayInterface, Cost\Tax\HasTaxKbnInterface, Point\HasPointInterface, HasGdidInterface
{
    use Cost\Tanka\TankaKbnTrait;
    use Day\DayTrait;
    use Cost\Tax\TaxKbnTrait;
    use Point\PointTrait;
    use GdidTrait;

    /** @var ?float 税率 */
    protected ?float $taxrate = null;

    /** @var ?float 税込単価 */
    protected ?float $inctanka = null;

    /** @var ?float 税抜単価 */
    protected ?float $revtanka = null;

    /** @var ?string 備考 */
    protected ?string $note = null;

    /**
     * {@inheritDoc}
     */
    public function getTaxrate(): ?float
    {
        return $this->taxrate;
    }

    /**
     * {@inheritDoc}
     */
    public function setTaxrate(?string $taxrate)
    {
        $this->taxrate = NumberConverter::stringWithCommaToFloat($taxrate);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getInctanka(): ?float
    {
        return $this->inctanka;
    }

    /**
     * {@inheritDoc}
     */
    public function setInctanka(?string $inctanka)
    {
        $this->inctanka = NumberConverter::stringWithCommaToFloat($inctanka);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getRevtanka(): ?float
    {
        return $this->revtanka;
    }

    /**
     * {@inheritDoc}
     */
    public function setRevtanka(?string $revtanka)
    {
        $this->revtanka = NumberConverter::stringWithCommaToFloat($revtanka);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * {@inheritDoc}
     */
    public function setNote(?string $note): static
    {
        $this->note = $note;

        return $this;
    }
}

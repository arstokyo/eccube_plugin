<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\Util\Converter\NumberConverter;


/**
 * Class for GoodTankaModelGroup1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GoodTankaModelGroup1 implements GoodTankaModelGroup1Interface
{
    use Cost\Tanka\TankaKbnTrait,
        Day\DayTrait,
        Cost\Tax\TaxKbnTrait,
        Point\PointTrait,
        Day\NdayTrait,
        GdidTrait;

    /** @var ?float $taxrate 税率 */
    protected ?float $taxrate = null;

    /** @var ?float $inctanka 税込単価 */
    protected ?float $inctanka = null;

    /** @var ?float $revtanka 税抜単価 */
    protected ?float $revtanka = null;

    /** @var ?string $note 備考 */
    protected ?string $note = null;

    /** @var ?int $ntaxrate 次回税率 */
    protected ?int $ntaxrate = null;

    /** @var ?float $ninctanka 次回税込単価 */
    protected ?float $ninctanka = null;

    /** @var ?float $nrevtanka 次回税抜単価 */
    protected ?float $nrevtanka = null;

    /** @var ?int $ntaxkbn 次回税区分 */
    protected ?int $ntaxkbn = null;

    /** @var ?int $npoint 次回ポイント */
    protected ?int $npoint = null;

    /** @var ?string $nnote 次回備考 */
    protected ?string $nnote = null;

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
    public function setNote(?string $note)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNtaxrate(): ?float
    {
        return $this->ntaxrate;
    }

    /**
     * {@inheritDoc}
     */
    public function setNtaxrate(?string $ntaxrate)
    {
        $this->ntaxrate = NumberConverter::stringWithCommaToFloat($ntaxrate);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNinctanka(): ?float
    {
        return $this->ninctanka;
    }

    /**
     * {@inheritDoc}
     */
    public function setNinctanka(?string $ninctanka)
    {
        $this->ninctanka = NumberConverter::stringWithCommaToFloat($ninctanka);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNrevtanka(): ?float
    {
        return $this->nrevtanka;
    }

    /**
     * {@inheritDoc}
     */
    public function setNrevtanka(?string $nrevtanka)
    {
        $this->nrevtanka = NumberConverter::stringWithCommaToFloat($nrevtanka);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNtaxkbn(): ?int
    {
        return $this->ntaxkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setNtaxkbn(?int $ntaxkbn)
    {
        $this->ntaxkbn = $ntaxkbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNpoint(): ?int
    {
        return $this->npoint;
    }

    /**
     * {@inheritDoc}
     */
    public function setNpoint(?int $npoint)
    {
        $this->npoint = $npoint;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNnote(): ?string
    {
        return $this->nnote;
    }

    /**
     * {@inheritDoc}
     */
    public function setNnote(?string $nnote)
    {
        $this->nnote = $nnote;
        return $this;
    }
}
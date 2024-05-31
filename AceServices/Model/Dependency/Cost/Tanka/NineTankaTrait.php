<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tanka;

use Plugin\AceClient\Util\Converter\NumberConverter;

/**
 * Trait for 9段単価
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait NineTankaTrait 
{
    /** @var ?float $tanka1 1段目単価 */
    protected ?float $tanka1 = null;
    
    /** @var ?float $tanka2 2段目単価 */
    protected ?float $tanka2 = null;
    
    /** @var ?float $tanka3 3段目単価 */
    protected ?float $tanka3 = null;
    
    /** @var ?float $tanka4 4段目単価 */
    protected ?float $tanka4 = null;
    
    /** @var ?float $tanka5 5段目単価 */
    protected ?float $tanka5 = null;
    
    /** @var ?float $tanka6 6段目単価 */
    protected ?float $tanka6 = null;
    
    /** @var ?float $tanka7 7段目単価 */
    protected ?float $tanka7 = null;
    
    /** @var ?float $tanka8 8段目単価 */
    protected ?float $tanka8 = null;
    
    /** @var ?float $tanka9 9段目単価 */
    protected ?float $tanka9 = null;
    
    /**
     * {@inheritDoc}
     */
    public function getTanka1(): ?float
    {
        return $this->tanka1;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka1(?string $tanka1): static
    {
        $this->tanka1 = NumberConverter::stringWithCommaToFloat($tanka1);
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getTanka2(): ?float
    {
        return $this->tanka2;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka2(?string $tanka2): static
    {
        $this->tanka2 = NumberConverter::stringWithCommaToFloat($tanka2);
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getTanka3(): ?float
    {
        return $this->tanka3;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka3(?string $tanka3): static
    {
        $this->tanka3 = NumberConverter::stringWithCommaToFloat($tanka3);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTanka4(): ?float
    {
        return $this->tanka4;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka4(?string $tanka4): static
    {
        $this->tanka4 = NumberConverter::stringWithCommaToFloat($tanka4);
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getTanka5(): ?float
    {
        return $this->tanka5;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka5(?string $tanka5): static
    {
        $this->tanka5 = NumberConverter::stringWithCommaToFloat($tanka5);
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getTanka6(): ?float
    {
        return $this->tanka6;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka6(?string $tanka6): static
    {
        $this->tanka6 = NumberConverter::stringWithCommaToFloat($tanka6);
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getTanka7(): ?float
    {
        return $this->tanka7;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka7(?string $tanka7): static
    {
        $this->tanka7 = NumberConverter::stringWithCommaToFloat($tanka7);
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getTanka8(): ?float
    {
        return $this->tanka8;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka8(?string $tanka8): static
    {
        $this->tanka8 = NumberConverter::stringWithCommaToFloat($tanka8);
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getTanka9(): ?float
    {
        return $this->tanka9;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka9(?string $tanka9): static
    {
        $this->tanka9 = NumberConverter::stringWithCommaToFloat($tanka9);
        return $this;
    }

}
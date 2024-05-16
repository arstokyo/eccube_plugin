<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tanka;

/**
 * Trait for 9段単価
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait NineTankaTrait 
{
    /** @var ?int $tanka1 1段目単価 */
    protected ?int $tanka1 = null;
    
    /** @var ?int $tanka2 2段目単価 */
    protected ?int $tanka2 = null;
    
    /** @var ?int $tanka3 3段目単価 */
    protected ?int $tanka3 = null;
    
    /** @var ?int $tanka4 4段目単価 */
    protected ?int $tanka4 = null;
    
    /** @var ?int $tanka5 5段目単価 */
    protected ?int $tanka5 = null;
    
    /** @var ?int $tanka6 6段目単価 */
    protected ?int $tanka6 = null;
    
    /** @var ?int $tanka7 7段目単価 */
    protected ?int $tanka7 = null;
    
    /** @var ?int $tanka8 8段目単価 */
    protected ?int $tanka8 = null;
    
    /** @var ?int $tanka9 9段目単価 */
    protected ?int $tanka9 = null;
    
    /**
     * {@inheritDoc}
     */
    public function getTanka1(): ?int
    {
        return $this->tanka1;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka1(?int $tanka1): static
    {
        $this->tanka1 = $tanka1;
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getTanka2(): ?int
    {
        return $this->tanka2;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka2(?int $tanka2): static
    {
        $this->tanka2 = $tanka2;
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getTanka3(): ?int
    {
        return $this->tanka3;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka3(?int $tanka3): static
    {
        $this->tanka3 = $tanka3;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTanka4(): ?int
    {
        return $this->tanka4;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka4(?int $tanka4): static
    {
        $this->tanka4 = $tanka4;
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getTanka5(): ?int
    {
        return $this->tanka5;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka5(?int $tanka5): static
    {
        $this->tanka5 = $tanka5;
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getTanka6(): ?int
    {
        return $this->tanka6;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka6(?int $tanka6): static
    {
        $this->tanka6 = $tanka6;
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getTanka7(): ?int
    {
        return $this->tanka7;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka7(?int $tanka7): static
    {
        $this->tanka7 = $tanka7;
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getTanka8(): ?int
    {
        return $this->tanka8;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka8(?int $tanka8): static
    {
        $this->tanka8 = $tanka8;
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getTanka9(): ?int
    {
        return $this->tanka9;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setTanka9(?int $tanka9): static
    {
        $this->tanka9 = $tanka9;
        return $this;
    }

}
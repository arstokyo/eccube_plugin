<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

/*
 * Trait for 商品コード
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait GcodeTrait
{
    
    /** @var string $gcode 商品コード */
    protected ?string $gcode = null;

    /**
     * {@inheritDoc}
     */
    public function getGcode(): ?string
    {
        return $this->gcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setGcode(?string $gcode): static
    {
        $this->gcode = $gcode;
        return $this;
    }
}
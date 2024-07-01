<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Trait for 商品名
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait GNameTrait
{

    /** @var ?string $gname 商品名 */
    protected ?string $gname = null;

    /**
     * {@inheritDoc}
     */
    public function getGname(): ?string
    {
        return $this->gname;
    }

    /**
     * {@inheritDoc}
     */
    public function setGname(?string $gname)
    {
        $this->gname = $gname;
        return $this;
    }

}
<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

/**
 * Trait for 商品 略名
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait SubNameTrait
{

    /** @var ?string $subName 商品 略名 */
    protected ?string $subName = null;

    /**
     * {@inheritDoc}
     */
    public function getSubName(): ?string
    {
        return $this->subName;
    }

    /**
     * {@inheritDoc}
     */
    public function setSubName(?string $subName)
    {
        $this->subName = $subName;
        return $this;
    }

}
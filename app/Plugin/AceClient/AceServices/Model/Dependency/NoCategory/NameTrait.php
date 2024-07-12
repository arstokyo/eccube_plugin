<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for 名称
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait NameTrait
{
    /** @var ?string $name 名称 */
    protected ?string $name = null;

    /**
     * {@inheritDoc}
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function setName(?string $name)
    {
        $this->name = $name;
        return $this;
    }
}
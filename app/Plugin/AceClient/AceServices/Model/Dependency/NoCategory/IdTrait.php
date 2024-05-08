<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for Id
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait IdTrait
{
    /** @var int $id 通販プロID */
    protected int $id;

    /**
     * {@inheritDoc}
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }
}
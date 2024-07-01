<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for 受注方法名称
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait JnameTrait
{
    /** @var ?string $jname 受注方法名称 */
    protected ?string $jname = null;

    /**
     * {@inheritDoc}
     */
    public function getJname(): ?string
    {
        return $this->jname;
    }

    /**
     * {@inheritDoc}
     */
    public function setJname(?string $jname): static
    {
        $this->jname = $jname;
        return $this;
    }
}
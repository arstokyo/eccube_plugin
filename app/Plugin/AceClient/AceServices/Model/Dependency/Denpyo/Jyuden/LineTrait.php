<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo\Jyuden;

/**
 * Trait for Line
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait LineTrait
{
    /** @var ?int $line 行番号 */
    protected ?int $line = null;

    /**
     * {@inheritDoc}
     */
    public function getLine(): ?int
    {
        return $this->line;
    }

    /**
     * {@inheritDoc}
     */
    public function setLine(?int $line)
    {
        $this->line = $line;
        return $this;
    }
}
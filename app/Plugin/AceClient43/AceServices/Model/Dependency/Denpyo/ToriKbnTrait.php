<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for 取引区分
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ToriKbnTrait
{
    /**
     * 取引区分
     * 
     * @var ?int
     */
    protected ?int $torikbn = null;

    /**
     * {@inheritDoc}
     */
    public function getTorikbn() : ?int
    {
        return $this->torikbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setTorikbn(?int $torikbn)
    {
        $this->torikbn = $torikbn;
        return $this;
    }
}
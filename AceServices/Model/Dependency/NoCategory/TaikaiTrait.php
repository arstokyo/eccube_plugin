<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for 退会フラグ
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TaikaiTrait
{
    /**
     * 退会フラグ
     *
     * @var ?int
     */
    protected ?int $taikai = null;

    /**
     * {@inheritDoc}
     */
    public function getTaikai() : ?int
    {
        return $this->taikai;
    }

    /**
     * {@inheritDoc}
     */
    public function setTaikai(?int $taikai)
    {
        $this->taikai = $taikai;
        return $this;
    }
}
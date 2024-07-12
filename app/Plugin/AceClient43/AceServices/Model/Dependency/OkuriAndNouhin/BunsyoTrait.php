<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\OkuriAndNouhin;

/**
 * Trait for 文章指定コード
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait BunsyoTrait 
{

    /** @var ?int $bunsyo 文章指定コード */
    protected ?int $bunsyo = null;

    /**
     * {@inheritDoc}
     */
    public function getBunsyo(): ?int
    {
        return $this->bunsyo;
    }

    /**
     * {@inheritDoc}
     */
    public function setBunsyo(?int $bunsyo)
    {
        $this->bunsyo = $bunsyo;
        return $this;
    }

}
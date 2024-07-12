<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Zaiko;

/**
 * Trait for 在庫調整数
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ChoseiZaikoTrait
{
    
    /** @var ?int $choseizaiko 在庫調整数 */
    protected ?int $choseizaiko = null;

    /**
    * {@inheritDoc}
    */
    public function getChoseizaiko(): ?int
    {
        return $this->choseizaiko;
    }

    /**
    * {@inheritDoc}
    */
    public function setChoseizaiko(?int $choseizaiko)
    {
        $this->choseizaiko = $choseizaiko;
        return $this;
    }

}
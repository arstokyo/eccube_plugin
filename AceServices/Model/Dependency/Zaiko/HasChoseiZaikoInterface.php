<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Zaiko;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface for 在庫調整数
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasChoseiZaikoInterface
{
   
    /**
     * Get 在庫調整数
     * 
     * @return int|null
     */
    #[SerializedName('chosei_zaiko')]
    public function getChoseizaiko(): ?int;

    /**
     * Set 在庫調整数
     * 
     * @param int|null $choseizaiko
     * @return $this
     */
    #[SerializedName('chosei_zaiko')]
    public function setChoseizaiko(?int $choseizaiko): static;
}
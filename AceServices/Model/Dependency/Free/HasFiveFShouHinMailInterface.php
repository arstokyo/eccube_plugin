<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Interface HasFiveFShouHinMailInterface
 * 
 * @Target : Plugin\AceClient\AceServices\Model\Dependency\Person
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasFiveFShouHinMailInterface
{

    /**
     * Get 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ1
     * 
     * @return ?string
     */
    public function getFShouHinMail1(): ?string;

    /**
     * Set 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ1
     * 
     * @param ?string $fShouHinMail1
     * @return self
     */
    public function setFShouHinMail1(?string $fShouHinMail1): self;

    /**
     * Get 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @return ?string
     */
    public function getFShouHinMail2(): ?string;

    /**
     * Set 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @param ?string $fShouHinMail2
     * @return self
     */
    public function setFShouHinMail2(?string $fShouHinMail2): self;

    /**
     * Get 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @return ?string
     */
    public function getFShouHinMail3(): ?string;

    /**
     * Set 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @param ?string $fShouHinMail3
     * @return self
     */
    public function setFShouHinMail3(?string $fShouHinMail3): self;

    /**
     * Get 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @return ?string
     */
    public function getFShouHinMail4(): ?string;

    /**
     * Set 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @param ?string $fShouHinMail4
     * @return self
     */
    public function setFShouHinMail4(?string $fShouHinMail4): self;

    /**
     * Get 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @return ?string
     */
    public function getFShouHinMail5(): ?string;

    /**
     * Set 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @param ?string $fShouHinMail5
     * @return self
     */
    public function setFShouHinMail5(?string $fShouHinMail5): self;
    
}
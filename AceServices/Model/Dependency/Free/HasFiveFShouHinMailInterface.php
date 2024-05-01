<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Interface For 5つ商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasFiveFshouHinMailInterface
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
     * @param ?string $fshouhinmail1
     */
    public function setFShouHinMail1(?string $fshouhinmail1);

    /**
     * Get 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @return ?string
     */
    public function getFShouHinMail2(): ?string;

    /**
     * Set 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @param ?string $fshouhinmail2
     */
    public function setFShouHinMail2(?string $fshouhinmail2);

    /**
     * Get 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @return ?string
     */
    public function getFShouHinMail3(): ?string;

    /**
     * Set 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @param ?string $fshouhinmail3
     */
    public function setFShouHinMail3(?string $fshouhinmail3);

    /**
     * Get 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @return ?string
     */
    public function getFShouHinMail4(): ?string;

    /**
     * Set 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @param ?string $fshouhinmail4
     */
    public function setFShouHinMail4(?string $fshouhinmail4);

    /**
     * Get 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @return ?string
     */
    public function getFShouHinMail5(): ?string;

    /**
     * Set 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @param ?string $fshouhinmail5
     */
    public function setFShouHinMail5(?string $fshouhinmail5);
    
}
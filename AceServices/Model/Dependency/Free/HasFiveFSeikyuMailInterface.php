<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Interface For Five Free Seikyu Mail
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasFiveFseikyuMailInterface
{

    /**
     * Get 請求明細ﾒｰﾙｱﾄﾞﾚｽ1
     * 
     * @return ?string
     */
    public function getFSeikyuMail1(): ?string;

    /**
     * Set 請求明細ﾒｰﾙｱﾄﾞﾚｽ1
     * 
     * @param ?string $fseikyumail1
     */
    public function setFSeikyuMail1(?string $fseikyumail1);

    /**
     * Get 請求明細ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @return ?string
     */
    public function getFSeikyuMail2(): ?string;

    /**
     * Set 請求明細ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @param ?string $fseikyumail2
     */
    public function setFSeikyuMail2(?string $fseikyumail2);

    /**
     * Get 請求明細ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @return ?string
     */
    public function getFSeikyuMail3(): ?string;

    /**
     * Set 請求明細ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @param ?string $fseikyumail3
     */
    public function setFSeikyuMail3(?string $fseikyumail3);

    /**
     * Get 請求明細ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @return ?string
     */
    public function getFSeikyuMail4(): ?string;

    /**
     * Set 請求明細ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @param ?string $fseikyumail4
     */
    public function setFSeikyuMail4(?string $fseikyumail4);

    /**
     * Get 請求明細ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @return ?string
     */
    public function getFSeikyuMail5(): ?string;

    /**
     * Set 請求明細ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @param ?string $fseikyumail5
     */
    public function setFSeikyuMail5(?string $fseikyumail5);

}

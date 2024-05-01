<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Interface For Five Free Seikyu Mail
 * 
 * @target : Plugin\AceClient\AceServices\Model\Dependency\Person
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasFiveFSeikyuMailInterface
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
     * @param ?string $fSeikyuMail1
     */
    public function setFSeikyuMail1(?string $fSeikyuMail1);

    /**
     * Get 請求明細ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @return ?string
     */
    public function getFSeikyuMail2(): ?string;

    /**
     * Set 請求明細ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @param ?string $fSeikyuMail2
     */
    public function setFSeikyuMail2(?string $fSeikyuMail2);

    /**
     * Get 請求明細ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @return ?string
     */
    public function getFSeikyuMail3(): ?string;

    /**
     * Set 請求明細ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @param ?string $fSeikyuMail3
     */
    public function setFSeikyuMail3(?string $fSeikyuMail3);

    /**
     * Get 請求明細ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @return ?string
     */
    public function getFSeikyuMail4(): ?string;

    /**
     * Set 請求明細ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @param ?string $fSeikyuMail4
     */
    public function setFSeikyuMail4(?string $fSeikyuMail4);

    /**
     * Get 請求明細ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @return ?string
     */
    public function getFSeikyuMail5(): ?string;

    /**
     * Set 請求明細ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @param ?string $fSeikyuMail5
     */
    public function setFSeikyuMail5(?string $fSeikyuMail5);

}

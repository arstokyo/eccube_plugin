<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;
/**
 * Interface For 5つ請求明細ﾒｰﾙｱﾄﾞﾚｽ
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
     * @return $this
     */
    public function setFSeikyuMail1(?string $fseikyumail1): static;
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
     * @return $this
     */
    public function setFSeikyuMail2(?string $fseikyumail2): static;
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
     * @return $this
     */
    public function setFSeikyuMail3(?string $fseikyumail3): static;
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
     * @return $this
     */
    public function setFSeikyuMail4(?string $fseikyumail4): static;
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
     * @return $this
     */
    public function setFSeikyuMail5(?string $fseikyumail5): static;

}
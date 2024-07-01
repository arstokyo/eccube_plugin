<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Interface For 5つ電子契約送付ﾒｰﾙｱﾄﾞﾚｽ
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasFiveFdenshiMailInterface
{
    /**
     * Get 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ1
     *
     * @return ?string
     */
    public function getFreeDenshiMail1(): ?string;

    /**
     * Set 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ1
     *
     * @param ?string $freedenshimail1
     * @return $this
     */
    public function setFreeDenshiMail1(?string $freedenshimail1);

    /**
     * Get 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ2
     *
     * @return ?string
     */
    public function getFreeDenshiMail2(): ?string;

    /**
     * Set 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ2
     *
     * @param ?string $freedenshimail2
     * @return $this
     */
    public function setFreeDenshiMail2(?string $freedenshimail2);

    /**
     * Get 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ3
     *
     * @return ?string
     */
    public function getFreeDenshiMail3(): ?string;

    /**
     * Set 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ3
     *
     * @param ?string $freedenshimail3
     * @return $this
     */
    public function setFreeDenshiMail3(?string $freedenshimail3);

    /**
     * Get 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ4
     *
     * @return ?string
     */
    public function getFreeDenshiMail4(): ?string;

    /**
     * Set 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ4
     *
     * @param ?string $freedenshimail4
     * @return $this
     */
    public function setFreeDenshiMail4(?string $freedenshimail4);

    /**
     * Get 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ5
     *
     * @return ?string
     */
    public function getFreeDenshiMail5(): ?string;

    /**
     * Set 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ5
     *
     * @param ?string $freedenshimail5
     * @return $this
     */
    public function setFreeDenshiMail5(?string $freedenshimail5);
}
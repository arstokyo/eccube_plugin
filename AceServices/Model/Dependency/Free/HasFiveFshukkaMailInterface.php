<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Interface For 5つ出荷報告ﾒｰﾙｱﾄﾞﾚｽ
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasFiveFshukkaMailInterface
{
    /**
     * Get 出荷報告ﾒｰﾙｱﾄﾞﾚｽ1
     *
     * @return ?string
     */
    public function getFShukkaMail1(): ?string;

    /**
     * Set 出荷報告ﾒｰﾙｱﾄﾞﾚｽ1
     *
     * @param ?string $fshukkamail1
     * @return $this
     */
    public function setFShukkaMail1(?string $fshukkamail1);

    /**
     * Get 出荷報告ﾒｰﾙｱﾄﾞﾚｽ2
     *
     * @return ?string
     */
    public function getFShukkaMail2(): ?string;

    /**
     * Set 出荷報告ﾒｰﾙｱﾄﾞﾚｽ2
     *
     * @param ?string $fshukkamail2
     * @return $this
     */
    public function setFShukkaMail2(?string $fshukkamail2);

    /**
     * Get 出荷報告ﾒｰﾙｱﾄﾞﾚｽ3
     *
     * @return ?string
     */
    public function getFShukkaMail3(): ?string;

    /**
     * Set 出荷報告ﾒｰﾙｱﾄﾞﾚｽ3
     *
     * @param ?string $fshukkamail3
     * @return $this
     */
    public function setFShukkaMail3(?string $fshukkamail3);

    /**
     * Get 出荷報告ﾒｰﾙｱﾄﾞﾚｽ4
     *
     * @return ?string
     */
    public function getFShukkaMail4(): ?string;

    /**
     * Set 出荷報告ﾒｰﾙｱﾄﾞﾚｽ4
     *
     * @param ?string $fshukkamail4
     * @return $this
     */
    public function setFShukkaMail4(?string $fshukkamail4);

    /**
     * Get 出荷報告ﾒｰﾙｱﾄﾞﾚｽ5
     *
     * @return ?string
     */
    public function getFShukkaMail5(): ?string;

    /**
     * Set 出荷報告ﾒｰﾙｱﾄﾞﾚｽ5
     *
     * @param ?string $fshukkamail5
     * @return $this
     */
    public function setFShukkaMail5(?string $fshukkamail5);
}
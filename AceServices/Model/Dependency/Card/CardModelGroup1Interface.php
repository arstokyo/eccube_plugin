<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface for CardModelGroup1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface CardModelGroup1Interface extends CardModelLevel2Interface
{

    /**
     * {@inheritDoc}
     */
    #[SerializedName('card_code')]
    public function setCcode(string|null $ccode): static;

    /**
     * {@inheritDoc}
     */
    #[SerializedName('card_no')]
    public function setCno(string|null $cno): static;

    /**
     * {@inheritDoc}
     */
    #[SerializedName('card_kigen')]
    public function setCkigen(\Datetime|string|null $ckigen): static;

    /**
     * {@inheritDoc}
     */
    #[SerializedName('card_pay')]
    public function setCpay(int|null $cpay): static;

    /**
     * {@inheritDoc}
     */
    #[SerializedName('card_syonin')]
    public function setSyounin(string|null $syounin): static;

    /**
     * {@inheritDoc}
     */
    #[SerializedName('sps_memid')]
    public function setSpscustomerid(string|null $spscustomerid): static;

    /**
     * {@inheritDoc}
     */
    #[SerializedName('sps_tracid')]
    public function setSpstid(string|null $spstid): static;

    /**
     * {@inheritDoc}
     */
    #[SerializedName('orderid')]
    public function setVeriorderid(string|null $veriorderid): static;

    /**
     * Get 通販AceSyID
     * 
     * @return string|null
     */
    public function getInkokyakuid(): ?string;

    /**
     * Set 通販AceSyID
     * 
     * @param string|null $inkokyakuid
     * @return $this
     */
    #[SerializedName('in_kokyaku_id')]
    public function setInkokyakuid(string|null $inkokyakuid): static;

    /**
     * Get 顧客コード
     * 
     * @return string|null
     */
    public function getInchumonid(): ?string;

    /**
     * Set 顧客コード
     * 
     * @param string|null $inchumonid
     * @return $this
     */
    #[SerializedName('in_chumon_id')]
    public function setInchumonid(string|null $inchumonid): static;

    /**
     * Get セッションID
     * 
     * @return string|null
     */
    public function getIntokushu1(): ?string;

    /**
     * Set セッションID
     * 
     * @param string|null $intokushu1
     * @return $this
     */
    #[SerializedName('in_tokushu1')]
    public function setIntokushu1(string|null $intokushu1): static;

    /**
     * Get 枝番号
     * 
     * @return string|null
     */
    public function getIntokushu2(): ?string;

    /**
     * Set 枝番号
     * 
     * @param string|null $intokushu2
     * @return $this
     */
    #[SerializedName('in_tokushu2')]
    public function setIntokushu2(string|null $intokushu2): static;

    /**
     * Get EC受付番号
     * 
     * @return string|null
     */
    #[SerializedName('uke_no')]
    public function getUkeno(): ?string;

    /**
     * Set EC受付番号
     * 
     * @param string|null $ukeno
     * @return $this
     */
    #[SerializedName('uke_no')]
    public function setUkeno(string|null $ukeno): static;

    /**
     * Get PGT顧客ID
     * 
     * @return string|null
     */
    public function getPgtmemid(): ?string;

    /**
     * Set PGT顧客ID
     * 
     * @param string|null $pgtmemid
     * @return $this
     */
    #[SerializedName('pgt_memid')]
    public function setPgtmemid(string|null $pgtmemid): static;

    /**
     * Get PGT顧客カードID
     * 
     * @return string|null
     */
    public function getPgtmemcdid(): ?string;

    /**
     * Set PGT顧客カードID
     * 
     * @param string|null $pgtmemcdid
     * @return $this
     */
    #[SerializedName('pgt_memcdid')]
    public function setPgtmemcdid(string|null $pgtmemcdid): static;

    /**
     * Get PGT取引ID
     * 
     * @return string|null
     */
    public function getPgttid(): ?string;

    /**
     * Set PGT取引ID
     * 
     * @param string|null $pgttid
     * @return $this
     */
    #[SerializedName('pgt_tid')]
    public function setPgttid(string|null $pgttid): static;

    /**
     * Get PGT決済ID
     * 
     * @return string|null
     */
    public function getPgtid(): ?string;

    /**
     * Set PGT決済ID
     * 
     * @param string|null $pgtid
     * @return $this
     */
    #[SerializedName('pgt_id')]
    public function setPgtid(string|null $pgtid): static;

    /**
     * Get PGTイシュア区分
     * 
     * @return string|null
     */
    public function getPgticls(): ?string;

    /**
     * Set PGTイシュア区分
     * 
     * @param string|null $pgticls
     * @return $this
     */
    #[SerializedName('pgt_icls')]
    public function setPgticls(string|null $pgticls): static;

    /**
     * Get GMOカード登録連番
     * 
     * @return string|null
     */
    public function getGmocardeda(): ?string;

    /**
     * Set GMOカード登録連番
     * 
     * @param string|null $gmocardeda
     * @return $this
     */
    #[SerializedName('gmocardeda')]
    public function setGmocardeda(string|null $gmocardeda): static;

}
<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Card;

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
    /** @SerializedName("card_code") */
    public function setCcode(?string $ccode);

    /**
     * {@inheritDoc}
     */
    /** @SerializedName("card_no") */
    public function setCno(?string $cno);

    /**
     * {@inheritDoc}
     */
    /** @SerializedName("card_kigen") */
    public function setCkigen($ckigen);

    /**
     * {@inheritDoc}
     */
    /** @SerializedName("card_pay") */
    public function setCpay(?int $cpay);

    /**
     * {@inheritDoc}
     */
    /** @SerializedName("card_syonin") */
    public function setSyounin(?string $syounin);

    /**
     * {@inheritDoc}
     */
    /** @SerializedName("sps_memid") */
    public function setSpscustomerid(?string $spscustomerid);

    /**
     * {@inheritDoc}
     */
    /** @SerializedName("sps_tracid") */
    public function setSpstid(?string $spstid);

    /**
     * {@inheritDoc}
     */
    /** @SerializedName("orderid") */
    public function setVeriorderid(?string $veriorderid);

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
    /** @SerializedName("pgt_memid") */
    public function setPgtmemid(?string $pgtmemid);

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
    /** @SerializedName("pgt_memcdid") */
    public function setPgtmemcdid(?string $pgtmemcdid);

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
    /** @SerializedName("pgt_tid") */
    public function setPgttid(?string $pgttid);

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
    /** @SerializedName("pgt_id") */
    public function setPgtid(?string $pgtid);

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
    /** @SerializedName("pgt_icls") */
    public function setPgticls(?string $pgticls);

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
    /** @SerializedName("gmocardeda") */
    public function setGmocardeda(?string $gmocardeda);

}
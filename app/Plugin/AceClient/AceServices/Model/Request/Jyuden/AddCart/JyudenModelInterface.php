<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyuden\JyudenModelGroup1Interface;
use Plugin\AceClient\AceServices\Model\Request;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface for Jyuden Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyudenModelInterface extends JyudenModelGroup1Interface
{

    /**
     * Get カード決済時の情報
     * 
     * @return Request\Jyuden\AddCart\CardInfoModel|null
     */
    public function getCardInfo(): ?CardInfoModel;

    /**
     * Set カード決済時の情報
     * 
     * @param Request\Jyuden\AddCart\CardInfoModel|null $cardInfo
     * @return self
     */
    /** @SerializedName("card_info") */
    public function setCardInfo(?CardInfoModel $cardInfo): self;

    /**
     * Get コンビニ決済時の情報
     * 
     * @return Request\Jyuden\AddCart\CvsInfoModel|null
     */
    public function getCvsInfo(): ?CvsInfoModel;

    /**
     * Set コンビニ決済時の情報
     * 
     * @param Request\Jyuden\AddCart\CvsInfoModel|null $cvsInfo
     * @return self
     */
    /** @SerializedName("cvs_info") */
    public function setCvsInfo(?CvsInfoModel $cvsInfo): self;

    /**
     * Get ＧＭＯ後払い時の情報
     * 
     * @return Request\Jyuden\AddCart\DpsInfoModelInterface|null
     */
    public function getDpsInfo(): ?DpsInfoModelInterface;

    /**
     * Set ＧＭＯ後払い時の情報
     * 
     * @param Request\Jyuden\AddCart\DpsInfoModel|null $dpsInfo
     * @return self
     */
    /** @SerializedName("dps_info") */
    public function setDpsInfo(?DpsInfoModelInterface $dpsInfo): self;

}
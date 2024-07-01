<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Rireki;

use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Payment;
use Plugin\AceClient\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;
use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\Dependency\Free;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;
use Symfony\Component\Serializer\Annotation\SerializedName;


/**
 * Interface for RirekiModelLevel2
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface RirekiModelLevel2Interface extends RirekiModelLevel1Interface,
                                            Good\HasGcodeInterface,
                                            Good\HasGNameInterface,
                                            Nocategory\HasSuuInterface,
                                            Cost\Tanka\HasTankaInterface,
                                            Cost\Money\HasMoneyInterface,
                                            Day\HasJdayInterface,
                                            Payment\HasPcodeInterface,
                                            Payment\HasPnameInterface,
                                            Haiso\HasHcodeInterface,
                                            Cost\Tax\HasUtaxInterface,
                                            Cost\Tax\HasStaxInterface,
                                            Haiso\HasHnameInterface,
                                            Haiso\HasHkNameInterface,
                                            Denpyo\HasDenkuInterface,
                                            GiftAndCampaign\HasCKbnInterface,
                                            Good\HasGkbnInterface,
                                            NoCategory\HasMcodeInterface,
                                            Bikou\HasMBikouInterface,
                                            GiftAndCampaign\HasGiftNoInterface,
                                            Denpyo\HasDenkuNumInterface,
                                            Denpyo\HasLineInterface,
                                            Free\HasThreeFcodeInterface,
                                            Bikou\HasThreeDenBikouInterface,
                                            Bikou\HasTwoNBikouInterface,
                                            Bikou\HasTwoOBikouInterface,
                                            Free\HasThreeFmemoInterface,
                                            Haiso\HaisoModelGroup1Interface,
                                            Denpyo\HasJnameInterface
{
    /**
     * {@inheritDoc}
     */
    /** @SerializedName("PAYNAME") */
    public function setPname(?string $pname);

    /**
     * {@inheritDoc}
     */
    /** @SerializedName("NAME") */
    public function setGname(?string $gname);

    /**
    * Get 受注顧客コード
    */
    public function getMcode(): ?string;

    /**
     * Set 受注顧客コード
     */
    public function setMcode(?string $mcode);

    /**
    * Get 受付日
    */
    public function getDay();

    /**
     * Set 受付日
     */
    public function setDay($day);
}
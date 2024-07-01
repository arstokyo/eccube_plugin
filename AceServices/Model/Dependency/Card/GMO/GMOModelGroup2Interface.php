<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card\GMO;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface for GMOグループ2
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface GMOModelGroup2Interface extends HasGMODpsOrderIdInterface, HasGMODpsTIdInterface
{

    /**
     * {@inheritDoc}
     */
    /** @SerializedName("gmodps_orderid") */
    public function setGmodpsorderid(?string $gmodpsorderid);

    /**
     * {@inheritDoc}
     */
    /** @SerializedName("gmodps_tid") */
    public function setGmodpstid(?string $gmodpstid);
    
}
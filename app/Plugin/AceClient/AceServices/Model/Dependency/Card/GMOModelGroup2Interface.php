<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card;

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
    #[SerializedName('gmodps_orderid')]
    public function setGmodpsorderid(string|null $gmodpsorderid): static;

    /**
     * {@inheritDoc}
     */
    #[SerializedName('gmodps_tid')]
    public function setGmodpstid(string|null $gmodpstid): static;
    
}
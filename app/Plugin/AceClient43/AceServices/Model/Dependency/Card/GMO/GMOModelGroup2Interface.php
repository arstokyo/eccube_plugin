<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Dependency\Card\GMO;

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

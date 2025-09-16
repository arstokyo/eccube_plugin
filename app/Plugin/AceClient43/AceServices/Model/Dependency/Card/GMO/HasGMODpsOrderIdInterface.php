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

/**
 * Interface for Has 加盟店取引ID
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasGMODpsOrderIdInterface
{
    /**
     * Get 加盟店取引ID
     *
     * @return string|null
     */
    public function getGmodpsorderid(): ?string;

    /**
     * Set 加盟店取引ID
     *
     * @param string|null $gmodpsorderid
     *
     * @return $this
     */
    public function setGmodpsorderid(?string $gmodpsorderid);
}

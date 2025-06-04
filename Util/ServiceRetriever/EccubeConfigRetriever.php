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

namespace Plugin\AceClient43\Util\ServiceRetriever;

use Eccube\Common\EccubeConfig;

/**
 * Retriver for EccubeConfig.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class EccubeConfigRetriever
{
    private EccubeConfig $eccubeConfig;

    /**
     * ServiceRetriveHelper constructor.
     *
     * @param EccubeConfig $eccubeConfig
     */
    public function __construct(
        EccubeConfig $eccubeConfig,
    ) {
        $this->eccubeConfig = $eccubeConfig;
    }

    /**
     * Get the eccube config.
     *
     * @return EccubeConfig
     */
    public function getEccubeConfig(): EccubeConfig
    {
        return $this->eccubeConfig;
    }
}

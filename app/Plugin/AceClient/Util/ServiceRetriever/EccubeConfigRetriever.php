<?php

namespace Plugin\AceClient\Util\ServiceRetriever;

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
    public function __construct
    (
        EccubeConfig $eccubeConfig
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
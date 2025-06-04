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

use Plugin\AceClient43\Util\Serializer\AceConfigSerializer;

/**
 * Retriever for AceConfigSerializer.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceConfigSerializerRetriever
{
    private AceConfigSerializer $aceConfigSerializer;

    /**
     * AceConfigSerializerRetriever constructor.
     *
     * @param AceConfigSerializer $aceConfigSerializer
     */
    public function __construct(
        AceConfigSerializer $aceConfigSerializer,
    ) {
        $this->aceConfigSerializer = $aceConfigSerializer;
    }

    /**
     * Get the AceConfigSerializer.
     *
     * @return AceConfigSerializer
     */
    public function getAceConfigSerializer(): AceConfigSerializer
    {
        return $this->aceConfigSerializer;
    }
}

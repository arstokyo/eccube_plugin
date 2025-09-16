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

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

trait MbidTrait
{
    /** @var ?string 顧客ID */
    protected ?string $mbid = null;

    /**
     * {@inheritDoc}
     */
    public function getMbid(): ?string
    {
        return $this->mbid;
    }

    /**
     * {@inheritDoc}
     */
    public function setMbid(?string $mbid)
    {
        $this->mbid = $mbid;

        return $this;
    }
}

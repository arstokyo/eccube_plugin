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

/**
 * Trait for セッションID
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait SessIdTrait
{
    /** @var string セッションID */
    protected ?string $sessId = null;

    /**
     * {@inheritDoc}
     */
    public function getSessId(): ?string
    {
        return $this->sessId;
    }

    /**
     * {@inheritDoc}
     */
    public function setSessId(?string $sessId)
    {
        $this->sessId = $sessId;

        return $this;
    }
}

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
 * Trait for GMO取引ID
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait GMODpsTIdTrait
{
    /**
     * GMO取引ID
     *
     * @var string|null
     */
    protected ?string $gmodpstid = null;

    /**
     * {@inheritDoc}
     */
    public function getGmodpstid(): ?string
    {
        return $this->gmodpstid;
    }

    /**
     * {@inheritDoc}
     */
    public function setGmodpstid(?string $gmodpstid)
    {
        $this->gmodpstid = $gmodpstid;

        return $this;
    }
}

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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Bikou;

/**
 * Trait for 明細備考
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait MBikouTrait
{
    /** @var ?string 明細備考 */
    protected ?string $mbikou = null;

    /**
     * {@inheritDoc}
     */
    public function getMbikou(): ?string
    {
        return $this->mbikou;
    }

    /**
     * {@inheritDoc}
     */
    public function setMbikou(?string $mbikou)
    {
        $this->mbikou = $mbikou;

        return $this;
    }
}

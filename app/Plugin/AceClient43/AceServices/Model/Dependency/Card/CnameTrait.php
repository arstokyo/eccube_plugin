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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Card;

/**
 * Trait for カード名義人
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait CnameTrait
{
    /**
     * カード名義人
     *
     * @var string|null
     */
    protected ?string $cname = null;

    /**
     * {@inheritDoc}
     */
    public function getCname(): ?string
    {
        return $this->cname;
    }

    /**
     * {@inheritDoc}
     */
    public function setCname(?string $cname)
    {
        $this->cname = $cname;

        return $this;
    }
}

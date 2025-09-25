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

use Plugin\AceClient43\AceServices\Model\Dependency\Card\GMO\GMOStatusTrait;

/**
 * Trait for Card Level 3
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait CardModelLevel3Trait
{
    use GMOStatusTrait;

    /** @var ?int SPS status */
    protected ?int $spsstatus = null;

    /** @var ?string ペイジェント決済ID */
    protected ?string $pgtkid = null;

    /** @var ?int ペイジェント決済ステータス */
    protected ?int $pgtstatus = null;

    /**
     * {@inheritDoc}
     */
    public function getSpsstatus(): ?int
    {
        return $this->spsstatus;
    }

    /**
     * {@inheritDoc}
     */
    public function setSpsstatus(?int $spsstatus)
    {
        $this->spsstatus = $spsstatus;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPgtkid(): ?string
    {
        return $this->pgtkid;
    }

    /**
     * {@inheritDoc}
     */
    public function setPgtkid(?string $pgtkid)
    {
        $this->pgtkid = $pgtkid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPgtstatus(): ?int
    {
        return $this->pgtstatus;
    }

    /**
     * {@inheritDoc}
     */
    public function setPgtstatus(?int $pgtstatus)
    {
        $this->pgtstatus = $pgtstatus;

        return $this;
    }
}

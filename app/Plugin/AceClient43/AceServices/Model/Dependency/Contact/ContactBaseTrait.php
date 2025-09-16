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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Contact;

/**
 * Trait Contactmei
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ContactBaseTrait
{
    /** @var ?int 枝番号 */
    protected ?int $edano = null;
    /** @var ?int ステータス */
    protected ?int $status = null;
    /** @var ?string 作成ユーザーID */
    protected ?string $cuser = null;

    /** @var ?string 更新ユーザーID */
    protected ?string $uuser = null;

    /**
     * {@inheritDoc}
     */
    public function getEdano(): ?int
    {
        return $this->edano;
    }

    /**
     * {@inheritDoc}
     */
    public function setEdano(?int $edano)
    {
        $this->edano = $edano;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus(?int $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCuser(): ?string
    {
        return $this->cuser;
    }

    /**
     * {@inheritDoc}
     */
    public function setCuser(?string $cuser)
    {
        $this->cuser = $cuser;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getUuser(): ?string
    {
        return $this->uuser;
    }

    /**
     * {@inheritDoc}
     */
    public function setUuser(?string $uuser)
    {
        $this->uuser = $uuser;

        return $this;
    }
}

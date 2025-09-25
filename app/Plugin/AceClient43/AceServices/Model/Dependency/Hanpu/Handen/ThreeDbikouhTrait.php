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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Handen;

/**
 * Trait ThreeDbikouh
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ThreeDbikouhTrait
{
    /** @var ?string 伝票備考1 */
    protected ?string $dbikouh1 = null;

    /** @var ?string 伝票備考2 */
    protected ?string $dbikouh2 = null;

    /** @var ?string 伝票備考3 */
    protected ?string $dbikouh3 = null;

    /**
     * {@inheritDoc}
     */
    public function getDbikouh1(): ?string
    {
        return $this->dbikouh1;
    }

    /**
     * {@inheritDoc}
     */
    public function setDbikouh1(?string $dbikouh1)
    {
        $this->dbikouh1 = $dbikouh1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDbikouh2(): ?string
    {
        return $this->dbikouh2;
    }

    /**
     * {@inheritDoc}
     */
    public function setDbikouh2(?string $dbikouh2)
    {
        $this->dbikouh2 = $dbikouh2;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDbikouh3(): ?string
    {
        return $this->dbikouh3;
    }

    /**
     * {@inheritDoc}
     */
    public function setDbikouh3(?string $dbikouh3)
    {
        $this->dbikouh3 = $dbikouh3;

        return $this;
    }
}

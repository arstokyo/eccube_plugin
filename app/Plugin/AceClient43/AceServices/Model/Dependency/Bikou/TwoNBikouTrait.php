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
 * Trait for Two 納品書備考
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TwoNBikouTrait
{
    /** @var ?string 納品書備考1 */
    protected ?string $nbikou1 = null;
    /** @var ?string 納品書備考2 */
    protected ?string $nbikou2 = null;

    /**
     * {@inheritDoc}
     */
    public function getNbikou1(): ?string
    {
        return $this->nbikou1;
    }

    /**
     * {@inheritDoc}
     */
    public function setNbikou1(?string $nbikou1)
    {
        $this->nbikou1 = $nbikou1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNbikou2(): ?string
    {
        return $this->nbikou2;
    }

    /**
     * {@inheritDoc}
     */
    public function setNbikou2(?string $nbikou2)
    {
        $this->nbikou2 = $nbikou2;

        return $this;
    }
}

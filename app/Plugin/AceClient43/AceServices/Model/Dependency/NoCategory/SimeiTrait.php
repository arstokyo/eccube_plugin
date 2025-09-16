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

use Plugin\AceClient43\Util\Converter\NameConverter;

/**
 * Trait for 氏名
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait SimeiTrait
{
    /** @var ?string 氏名 */
    protected ?string $simei = null;

    /**
     * {@inheritDoc}
     */
    public function getSimei(): ?string
    {
        return $this->simei;
    }

    /**
     * {@inheritDoc}
     */
    public function setSimei(?string $simei)
    {
        $this->simei = $simei;

        return $this;
    }

    /**
     * 名前の最初の部分を取得
     *
     * @return string|null 名前の最初の部分、または氏名がnullの場合はnull
     */
    public function getName1(): ?string
    {
        $parts = NameConverter::splitName($this->getSimei());

        return $parts ? $parts[0] : null;
    }

    /**
     * 名前の2番目の部分を取得
     *
     * @return string|null 名前の2番目の部分、または2番目の部分がない場合やsimeiがnullの場合はnull
     */
    public function getName2(): ?string
    {
        $parts = NameConverter::splitName($this->getSimei());

        return $parts ? $parts[1] : null;
    }
}

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

namespace Plugin\AceClient43\Entity;

use Doctrine\ORM\Mapping as ORM;
use Plugin\AceClient43\Util\Converter\NumberConverter;

trait BaseItemTrait
{
    /**
     * Ace掛け税率
     *
     * @ORM\Column(name="ace_markup_rate", type="float", precision=10, scale=3, options={"comment":"Ace掛け税率"})
     *
     * @var float
     */
    private float $ace_markup_rate = 0;

    /**
     * プレゼントかどうか
     *
     * @var bool
     *
     * @ORM\Column(name="is_present", type="boolean", options={"default":false, "comment":"プレゼントかどうか"})
     */
    private bool $isPresent = false;

    /**
     * プレゼントかどうかを設定
     *
     * @return bool
     */
    public function isPresent(): bool
    {
        return $this->isPresent;
    }

    /**
     * プレゼントかどうかを設定
     *
     * @param bool $isPresent
     *
     * @return static
     */
    public function setIsPresent(bool $isPresent): static
    {
        $this->isPresent = $isPresent;

        return $this;
    }

    /**
     * 掛け税率を取得
     *
     * @return float
     */
    public function getAceMarkupRate(): float
    {
        return $this->ace_markup_rate;
    }

    /**
     * 掛け税率を設定
     *
     * @param float $ace_markup_rate
     *
     * @return $this
     */
    public function setAceMarkupRate(float $ace_markup_rate)
    {
        $this->ace_markup_rate = $ace_markup_rate;

        return $this;
    }

    /**
     * Normalize number-like inputs to a decimal string with the given scale.
     *
     * @param mixed $value string|int|float|null
     * @param int $scale
     *
     * @return string
     */
    protected function normalizeNumberToDecimalString($value, int $scale = 2): string
    {
        return NumberConverter::convertNumberToDecimalString($value, $scale);
    }
}

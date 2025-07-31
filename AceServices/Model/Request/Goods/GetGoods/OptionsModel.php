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

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoods;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Model for Options
 */
class OptionsModel implements OptionsModelInterface
{
    /**
     * @var string|null
     *
     * @SerializedName("return_goodsfree_kubuns")
     */
    private ?string $returnGoodsKubun = null;

    /**
     * @var FiltersModelInterface|null
     */
    private ?FiltersModelInterface $filters = null;

    /**
     * @var bool|null
     *
     * @SerializedName("ignore_udate")
     */
    private ?bool $ignoreUdate = null;

    /**
     * @var string|null
     *
     * @SerializedName("extra_fields")
     */
    private ?string $extraFields = null;

    /**
     * @var bool|null
     *
     * @SerializedName("include_zaiko")
     */
    private ?bool $includeZaiko = null;

    /**
     * {@inheritDoc}
     */
    public function getReturnGoodsKubun(): ?string
    {
        return $this->returnGoodsKubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setReturnGoodsKubun(?array $returnGoodsKubun): self
    {
        if (is_array($returnGoodsKubun)) {
            $unique = array_unique($returnGoodsKubun);
            $this->returnGoodsKubun = implode(',', $unique);
        } else {
            $this->returnGoodsKubun = '';
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFilters(): ?FiltersModelInterface
    {
        return $this->filters;
    }

    /**
     * {@inheritDoc}
     */
    public function setFilters(?FiltersModelInterface $filters): self
    {
        $this->filters = $filters;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getIgnoreUdate(): ?bool
    {
        return $this->ignoreUdate;
    }

    /**
     * {@inheritDoc}
     */
    public function setIgnoreUdate(?bool $ignoreUdate): self
    {
        $this->ignoreUdate = $ignoreUdate;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getExtraFields(): ?string
    {
        return $this->extraFields;
    }

    /**
     * {@inheritDoc}
     */
    public function setExtraFields(?string $extraFields): self
    {
        $this->extraFields = $extraFields;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getIncludeZaiko(): ?bool
    {
        return $this->includeZaiko;
    }

    /**
     * {@inheritDoc}
     */
    public function setIncludeZaiko(?bool $includeZaiko): self
    {
        $this->includeZaiko = $includeZaiko;

        return $this;
    }
}

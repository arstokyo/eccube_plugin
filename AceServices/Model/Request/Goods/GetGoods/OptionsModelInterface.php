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

interface OptionsModelInterface
{
    /**
     * Get ReturnGoodsKubun
     *
     * @return string
     */
    public function getReturnGoodsKubun(): ?string;

    /**
     * Set ReturnGoodsKubun
     *
     * @param array $returnGoodsKubun
     *
     * @return self
     */
    public function setReturnGoodsKubun(?array $returnGoodsKubun): self;

    /**
     * Get Filters
     *
     * @return FiltersModelInterface|null
     */
    public function getFilters(): ?FiltersModelInterface;

    /**
     * Set Filters
     *
     * @param FiltersModelInterface|null $filters
     *
     * @return self
     */
    public function setFilters(?FiltersModelInterface $filters): self;

    /**
     * Get IgnoreUdate
     *
     * @return bool|null
     */
    public function getIgnoreUdate(): ?bool;

    /**
     * Set IgnoreUdate
     *
     * @param bool|null $ignoreUdate
     *
     * @return self
     */
    public function setIgnoreUdate(?bool $ignoreUdate): self;

    /**
     * Get ExtraFields
     *
     * @return string|null
     */
    public function getExtraFields(): ?string;

    /**
     * Set ExtraFields
     *
     * @param string|null $extraFields
     *
     * @return self
     */
    public function setExtraFields(?string $extraFields): self;

    /**
     * Get IncludeZaiko
     *
     * @return bool|null
     */
    public function getIncludeZaiko(): ?bool;

    /**
     * Set IncludeZaiko
     *
     * @param bool|null $includeZaiko
     *
     * @return self
     */
    public function setIncludeZaiko(?bool $includeZaiko): self;
}

<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoods;

interface FiltersModelInterface
{
    /**
     * Get Filters
     *
     * @return FilterModelInterface[]|null
     */
    public function getFilter(): ?array;

    /**
     * Set Filters
     *
     * @param FilterModelInterface[]|null $filters
     *
     * @return self
     */
    public function setFilter(?array $filters): self;
}

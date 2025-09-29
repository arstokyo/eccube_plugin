<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoods;

class FiltersModel implements FiltersModelInterface
{
    /**
     * @var FilterModelInterface[]|null
     */
    private ?array $filter = null;

    /**
     * {@inheritDoc}
     */
    public function getFilter(): ?array
    {
        return $this->filter;
    }

    /**
     * {@inheritDoc}
     */
    public function setFilter(?array $filter): self
    {
        $this->filter = $filter;

        return $this;
    }
}

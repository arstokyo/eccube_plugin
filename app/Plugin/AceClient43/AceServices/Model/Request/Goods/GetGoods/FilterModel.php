<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoods;

class FilterModel implements FilterModelInterface
{
    /**
     * @var string|null
     */
    private ?string $value = null;

    /**
     * @var string|null
     */
    private ?string $type = null;

    /**
     * {@inheritDoc}
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * {@inheritDoc}
     */
    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }
}

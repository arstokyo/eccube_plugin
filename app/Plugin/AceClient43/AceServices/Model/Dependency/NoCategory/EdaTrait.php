<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

trait EdaTrait
{
     /** @var ?string $eda 納品先枝番号 */
    protected ?string $eda = null;

    /**
      * {@inheritDoc}
      */
    public function getEda(): ?string
    {
        return $this->eda;
    }

    /**
      * {@inheritDoc}
      */
    public function setEda(?string $eda)
    {
        $this->eda = $eda;
        return $this;
    }
}
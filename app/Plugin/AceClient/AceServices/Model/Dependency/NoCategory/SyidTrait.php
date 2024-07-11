<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

trait SyidTrait
{
    /** @var ?int $syid 通販AceID */
    protected ?int $syid = null;

    /**
     * {@inheritDoc}
     */
    public function getSyid(): ?int
    {
        return $this->syid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSyid(?int $syid)
    {
        $this->syid = $syid;
        return $this;
    }
}
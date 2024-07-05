<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpuNext;

use Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Handen;

/**
 * Class HanpuSecondModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HanpuSecondModel implements HanpuSecondModelInterface
{
    use Handen\HandenModelGroup1Trait;

    /** @var ?int $siteday サイト(日単位) */
    protected ?int $siteday = null;

    /**
     * {@inheritDoc}
     */
    public function getSiteday(): ?int
    {
        return $this->siteday;
    }

    /**
     * {@inheritDoc}
     */
    public function setSiteday(?int $siteday): static
    {
        $this->siteday = $siteday;
        return $this;
    }
}
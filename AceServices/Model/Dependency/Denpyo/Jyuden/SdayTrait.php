<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo\Jyuden;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;


/**
 * Trait for Sday
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait SdayTrait
{
    /** @var ?AceDateTime\AceDateTime $sday 出荷日 */
    protected ?AceDateTime\AceDateTime $sday = null;

    /**
     * {@inheritDoc}
     */
    public function getSday(): ?AceDateTime\AceDateTimeInterface
    {
        return $this->sday;
    }

    /**
     * {@inheritDoc}
     */
    public function setSday(\DateTime|string|null $sday)
    {
        $this->sday = AceDateTime\AceDateTimeFactory::makeAceDateTime($sday);
        return $this;
    }
}
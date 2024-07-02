<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetHktime;

use Plugin\AceClient\AceServices\Model\Dependency\Haiso;

/**
 * Class HktimeModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class HktimeModel implements HktimeModelInterface
{
    use Haiso\HkCodeTrait,
        Haiso\HkNameTrait;

    /** @var ?int $hktime 時間 */
    protected ?int $hktime = null;

    /**
     * {@inheritDoc}
     */
    public function getHktime(): ?int
    {
        return $this->hktime;
    }

    /**
     * {@inheritDoc}
     */
    public function setHktime(?int $hktime): static
    {
        $this->hktime = $hktime;
        return $this;
    }
}

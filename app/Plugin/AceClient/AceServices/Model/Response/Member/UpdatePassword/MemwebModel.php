<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\UpdatePassword;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Model for MemwebModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemwebModel implements MemwebModelInterface
{
    use NoCategory\PassWdTrait;

    /** @var ?string $mbid 行番号 */
    protected ?string $mbid = null;

    /**
     * {@inheritDoc}
     */
    public function getMbid(): ?string
    {
        return $this->mbid;
    }

    /**
     * {@inheritDoc}
     */
    public function setMbid(?string $mbid)
    {
        $this->mbid = $mbid;
        return $this;
    }
}

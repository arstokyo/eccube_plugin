<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetMemberFree;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class MemberFreeModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class MemberFreeModel implements MemberFreeModelInterface
{
    use NoCategory\MbidTrait,
        NoCategory\KubunTrait;

    /** @var ?string $free フリー内容 */
    protected ?string $free = null;

    /**
     * {@inheritDoc}
     */
    public function getFree(): ?string
    {
        return $this->free;
    }

    /**
     * {@inheritDoc}
     */
    public function setFree(?string $free)
    {
        $this->free = $free;
        return $this;
    }
}
<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetMemberFree;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Class MemberFreeModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class MemberFreeModel implements MemberFreeModelInterface
{
    use NoCategory\MbidTrait;

    /** @var ?int $kubun フリー項目区分 */
    protected ?int $kubun = null;

    /** @var ?string $free フリー内容 */
    protected ?string $free = null;

    /**
     * {@inheritDoc}
     */
    public function getKubun(): ?int
    {
        return $this->kubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setKubun(?int $kubun)
    {
        $this->kubun = $kubun;
        return $this;
    }

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
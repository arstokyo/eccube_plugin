<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetMemberFree;


/**
 * Class MemberFreeModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class MemberFreeModel implements MemberFreeModelInterface
{

    /** @var ?string $mbid 顧客ID */
    protected ?string $mbid = null;

    /** @var ?int $kubun フリー項目区分 */
    protected ?int $kubun = null;

    /** @var ?string $free フリー内容 */
    protected ?string $free = null;

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
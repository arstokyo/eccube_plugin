<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetMemAnk;

/**
 * Class MemAnkModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class MemAnkModel implements MemAnkModelInterface
{
    /** @var ?string $mbid 顧客ID */
    protected ?string $mbid = null;

    /** @var ?int $kubun フリー項目区分 */
    protected ?int $kubun = null;

    /** @var ?int $ansno 回答番号 */
    protected ?int $ansno = null;

    /** @var ?string $ansid アンケートID */
    protected ?string $ansid = null;

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
    public function setMbid(?string $mbid): static
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
    public function setKubun(?int $kubun): static
    {
        $this->kubun = $kubun;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAnsno(): ?int
    {
        return $this->ansno;
    }

    /**
     * {@inheritDoc}
     */
    public function setAnsno(?int $ansno): static
    {
        $this->ansno = $ansno;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAnsid(): ?string
    {
        return $this->ansid;
    }

    /**
     * {@inheritDoc}
     */
    public function setAnsid(?string $ansid): static
    {
        $this->ansid = $ansid;
        return $this;
    }
}

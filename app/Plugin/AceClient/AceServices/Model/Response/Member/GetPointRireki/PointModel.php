<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetPointRireki;

use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Model for Point
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class PointModel implements PointModelInterface
{
    use Denpyo\DennoTrait,
        Day\JdayTrait,
        Day\DayTrait,
        Point\PointTrait;

    /** @var ?int $kubun ポイント区分 */
    protected ?int $kubun = null;

    /** @var ?int $nouno 納品先枝番号 */
    protected ?int $nouno = null;

    /** @var ?int $edano 受注枝番 */
    protected ?int $edano = null;

    /** @var ?int $brid ポイント種類 */
    protected ?int $brid = null;

    /** @var ?int $usekbn 使用区分 */
    protected ?int $usekbn = null;

    /** @var ?int $msyid 顧客共有システムID */
    protected ?int $msyid = null;

    /** @var ?string $jmemid 顧客ID */
    protected ?string $jmemid = null;

    /** @var ?string $cuser 作成ユーザーID */
    protected ?string $cuser = null;

    /** @var ?string $uuser 更新ユーザーID */
    protected ?string $uuser = null;
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
    public function getNouno(): ?int
    {
        return $this->nouno;
    }

    /**
     * {@inheritDoc}
     */
    public function setNouno(?int $nouno)
    {
        $this->nouno = $nouno;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getEdano(): ?int
    {
        return $this->edano;
    }

    /**
     * {@inheritDoc}
     */
    public function setEdano(?int $edano)
    {
        $this->edano = $edano;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBrid(): ?int
    {
        return $this->brid;
    }

    /**
     * {@inheritDoc}
     */
    public function setBrid(?int $brid)
    {
        $this->brid = $brid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getUsekbn(): ?int
    {
        return $this->usekbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setUsekbn(?int $usekbn)
    {
        $this->usekbn = $usekbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMsyid(): ?int
    {
        return $this->msyid;
    }

    /**
     * {@inheritDoc}
     */
    public function setMsyid(?int $msyid)
    {
        $this->msyid = $msyid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getJmemid(): ?string
    {
        return $this->jmemid;
    }

    /**
     * {@inheritDoc}
     */
    public function setJmemid(?string $jmemid)
    {
        $this->jmemid = $jmemid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCuser(): ?string
    {
        return $this->cuser;
    }

    /**
     * {@inheritDoc}
     */
    public function setCuser(?string $cuser)
    {
        $this->cuser = $cuser;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getUuser(): ?string
    {
        return $this->uuser;
    }

    /**
     * {@inheritDoc}
     */
    public function setUuser(?string $uuser)
    {
        $this->uuser = $uuser;
        return $this;
    }
}

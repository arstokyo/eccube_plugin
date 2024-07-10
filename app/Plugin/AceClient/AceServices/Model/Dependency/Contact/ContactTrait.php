<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Contact;

use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Trait Contact
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ContactTrait
{
    use Denpyo\DennoTrait,
        Good\GdidTrait,
        ContactBaseTrait;

    /** @var ?AceDateTime\AceDateTime $fdate 初回日時 */
    protected ?AceDateTime\AceDateTime $fdate = null;

    /** @var ?int $kind バウンド区分 */
    protected ?int $kind = null;

    /** @var ?int $msyid 顧客共有システムID */
    protected ?int $msyid = null;

    /** @var ?string $etcid 顧客／仕入先ID */
    protected ?string $etcid = null;

    /** @var ?int $nouno 納品先枝番 */
    protected ?int $nouno = null;

    /** @var ?string $ghid 品番 */
    protected ?string $ghid = null;

    /** @var ?string $lastgroup 最終グループ名 */
    protected ?string $lastgroup = null;

    /** @var ?string $cfreemst1 フリーマスタ1 */
    protected ?string $cfreemst1 = null;

    /** @var ?string $cfreememo1 フリーメモ1 */
    protected ?string $cfreememo1 = null;

    /** @var ?AceDateTime\AceDateTime $cfreeday1 フリー日付1 */
    protected ?AceDateTime\AceDateTime $cfreeday1 = null;

    /** @var ?string $cfreedata1 フリーデータ1 */
    protected ?string $cfreedata1 = null;

    /**
     * {@inheritDoc}
     */
    public function getFdate()
    {
        return $this->fdate;
    }

    /**
     * {@inheritDoc}
     */
    public function setFdate($fdate)
    {
        $this->fdate = AceDateTime\AceDateTimeFactory::makeAceDateTime($fdate, 'Y/m/d H:i:s');
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKind(): ?int
    {
        return $this->kind;
    }

    /**
     * {@inheritDoc}
     */
    public function setKind(?int $kind)
    {
        $this->kind = $kind;
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
    public function getEtcid(): ?string
    {
        return $this->etcid;
    }

    /**
     * {@inheritDoc}
     */
    public function setEtcid(?string $etcid)
    {
        $this->etcid = $etcid;
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
    public function getGhid(): ?string
    {
        return $this->ghid;
    }

    /**
     * {@inheritDoc}
     */
    public function setGhid(?string $ghid)
    {
        $this->ghid = $ghid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getLastgroup(): ?string
    {
        return $this->lastgroup;
    }

    /**
     * {@inheritDoc}
     */
    public function setLastgroup(?string $lastgroup)
    {
        $this->lastgroup = $lastgroup;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCfreemst1(): ?string
    {
        return $this->cfreemst1;
    }

    /**
     * {@inheritDoc}
     */
    public function setCfreemst1(?string $cfreemst1)
    {
        $this->cfreemst1 = $cfreemst1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCfreememo1(): ?string
    {
        return $this->cfreememo1;
    }

    /**
     * {@inheritDoc}
     */
    public function setCfreememo1(?string $cfreememo1)
    {
        $this->cfreememo1 = $cfreememo1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCfreeday1()
    {
        return $this->cfreeday1;
    }

    /**
     * {@inheritDoc}
     */
    public function setCfreeday1($cfreeday1)
    {
        $this->cfreeday1 = AceDateTime\AceDateTimeFactory::makeAceDateTime($cfreeday1, 'Y/m/d H:i:s');
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCfreedata1(): ?string
    {
        return $this->cfreedata1;
    }

    /**
     * {@inheritDoc}
     */
    public function setCfreedata1(?string $cfreedata1)
    {
        $this->cfreedata1 = $cfreedata1;
        return $this;
    }
}
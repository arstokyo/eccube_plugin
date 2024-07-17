<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Contact;

/**
 * Trait Contactmei
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ContactBaseTrait
{
    /** @var ?int $edano 枝番号 */
    protected ?int $edano = null;
    /** @var ?int $status ステータス */
    protected ?int $status = null;
    /** @var ?string $cuser 作成ユーザーID */
    protected ?string $cuser = null;

    /** @var ?string $uuser 更新ユーザーID */
    protected ?string $uuser = null;

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
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus(?int $status)
    {
        $this->status = $status;
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
<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Contact;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Trait Contactmei
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ContactmeiTrait
{
    use ContactBaseTrait;

    /** @var ?AceDateTime\AceDateTime $condate 日時 */
    protected ?AceDateTime\AceDateTime $condate = null;
    /** @var ?string $requestgroup 依頼グループ名 */
    protected ?string $requestgroup = null;

    /** @var ?string $requestuser 依頼ユーザーID */
    protected ?string $requestuser = null;
    /** @var ?AceDateTime\AceDateTime $athomedate 在宅日 */
    protected ?AceDateTime\AceDateTime $athomedate = null;

    /** @var ?string $athometime 在宅時間 */
    protected ?string $athometime = null;

    /** @var ?string $note1 会話メモ１ */
    protected ?string $note1 = null;

    /** @var ?string $note2 会話メモ２ */
    protected ?string $note2 = null;

    /**
     * {@inheritDoc}
     */
    public function getCondate()
    {
        return $this->condate;
    }

    /**
     * {@inheritDoc}
     */
    public function setCondate($condate)
    {
        $this->condate = AceDateTime\AceDateTimeFactory::makeAceDateTime($condate, 'Y/m/d H:i:s');
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getRequestgroup(): ?string
    {
        return $this->requestgroup;
    }

    /**
     * {@inheritDoc}
     */
    public function setRequestgroup(?string $requestgroup)
    {
        $this->requestgroup = $requestgroup;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getRequestuser(): ?string
    {
        return $this->requestuser;
    }

    /**
     * {@inheritDoc}
     */
    public function setRequestuser(?string $requestuser)
    {
        $this->requestuser = $requestuser;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAthomedate()
    {
        return $this->athomedate;
    }

    /**
     * {@inheritDoc}
     */
    public function setAthomedate($athomedate)
    {
        $this->athomedate = AceDateTime\AceDateTimeFactory::makeAceDateTime($athomedate, 'Y/m/d H:i:s');
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAthometime(): ?string
    {
        return $this->athometime;
    }

    /**
     * {@inheritDoc}
     */
    public function setAthometime(?string $athometime)
    {
        $this->athometime = $athometime;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNote1(): ?string
    {
        return $this->note1;
    }

    /**
     * {@inheritDoc}
     */
    public function setNote1(?string $note1)
    {
        $this->note1 = $note1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNote2(): ?string
    {
        return $this->note2;
    }

    /**
     * {@inheritDoc}
     */
    public function setNote2(?string $note2)
    {
        $this->note2 = $note2;
        return $this;
    }
}
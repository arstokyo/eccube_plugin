<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden\GetDeliveryInfo;

use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\OkuriAndNouhin;
use Plugin\AceClient\AceServices\Model\Dependency\Person;
use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient\AceServices\Model\Dependency\Person\Nmember\NcodeTrait;

/**
 * Class for DeliveryModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class DeliveryModel implements DeliveryModelInterface
{
    use Mail\MailTrait,
    Denpyo\DennoTrait,
    Denpyo\LineTrait,
    Good\GdidTrait,
    Good\GNameTrait,
    NoCategory\SuuTrait,
    OkuriAndNouhin\OkuriNoTrait,
    Person\Nmember\NadrTrait,
    Day\SdayTrait,
    Day\HdayTrait,
    Haiso\HkNameTrait,
    NoCategory\JmemidTrait;

    /** @var ?string $jname 氏名 */
    protected ?string $jname = null;

    /** @var ?string $jkana カナ */
    protected ?string $jkana = null;

    /** @var ?string $jzip 郵便番号 */
    protected ?string $jzip = null;

    /** @var ?string $jadr 住所 */
    protected ?string $jadr = null;

    /** @var ?string $jtel 電話番号 */
    protected ?string $jtel = null;

    /** @var ?string $nmemid お届先顧客ID */
    protected ?string $nmemid = null;

    /** @var ?string $nname 氏名 */
    protected ?string $nname = null;

    /** @var ?string $nkana カナ */
    protected ?string $nkana = null;

    /** @var ?string $nzip 郵便番号 */
    protected ?string $nzip = null;

    /** @var ?string $ntel 電話番号 */
    protected ?string $ntel = null;

    /**
     * {@inheritDoc}
     */
    public function getJname(): ?string
    {
        return $this->jname;
    }

    /**
     * {@inheritDoc}
     */
    public function setJname(?string $jname)
    {
        $this->jname = $jname;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getJkana(): ?string
    {
        return $this->jkana;
    }

    /**
     * {@inheritDoc}
     */
    public function setJkana(?string $jkana)
    {
        $this->jkana = $jkana;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getJzip(): ?string
    {
        return $this->jzip;
    }

    /**
     * {@inheritDoc}
     */
    public function setJzip(?string $jzip)
    {
        $this->jzip = $jzip;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getJadr(): ?string
    {
        return $this->jadr;
    }

    /**
     * {@inheritDoc}
     */
    public function setJadr(?string $jadr)
    {
        $this->jadr = $jadr;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getJtel(): ?string
    {
        return $this->jtel;
    }

    /**
     * {@inheritDoc}
     */
    public function setJtel(?string $jtel)
    {
        $this->jtel = $jtel;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNmemid(): ?string
    {
        return $this->nmemid;
    }

    /**
     * {@inheritDoc}
     */
    public function setNmemid(?string $nmemid)
    {
        $this->nmemid = $nmemid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNname(): ?string
    {
        return $this->nname;
    }

    /**
     * {@inheritDoc}
     */
    public function setNname(?string $nname)
    {
        $this->nname = $nname;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNkana(): ?string
    {
        return $this->nkana;
    }

    /**
     * {@inheritDoc}
     */
    public function setNkana(?string $nkana)
    {
        $this->nkana = $nkana;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNzip(): ?string
    {
        return $this->nzip;
    }

    /**
     * {@inheritDoc}
     */
    public function setNzip(?string $nzip)
    {
        $this->nzip = $nzip;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNtel(): ?string
    {
        return $this->ntel;
    }

    /**
     * {@inheritDoc}
     */
    public function setNtel(?string $ntel)
    {
        $this->ntel = $ntel;
        return $this;
    }
}
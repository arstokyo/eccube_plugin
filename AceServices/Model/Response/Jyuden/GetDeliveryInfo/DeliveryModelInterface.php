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

/**
 * Interface for DeliveryModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface DeliveryModelInterface extends Mail\HasMailInterface,
                                         Denpyo\HasDennoInterface,
                                         Denpyo\HasLineInterface,
                                         Good\HasGdidInterface,
                                         Good\HasGNameInterface,
                                         NoCategory\HasSuuInterface,
                                         OkuriAndNouhin\HasOkuriNoInterface,
                                         Person\Nmember\HasNadrInterface,
                                         Day\HasSdayInterface,
                                         Day\HasHdayInterface,
                                         Haiso\HasHkNameInterface,
                                         NoCategory\HasJmemidInterface
{
    /**
     * Get 受付先顧客ID
     *
     */
    public function getJmemid(): ?string;

    /**
     * Set 受付先顧客ID
     *
     */
    public function setJmemid(?string $jmemid);

    /**
     * Get 氏名
     *
     * @return ?string
     */
    public function getJname(): ?string;

    /**
     * Set 氏名
     *
     * @param ?string $jname
     * @return $this
     */
    public function setJname(?string $jname);

    /**
     * Get カナ
     *
     * @return ?string
     */
    public function getJkana(): ?string;

    /**
     * Set カナ
     *
     * @param ?string $jkana
     * @return $this
     */
    public function setJkana(?string $jkana);

    /**
     * Get 郵便番号
     *
     * @return ?string
     */
    public function getJzip(): ?string;

    /**
     * Set 郵便番号
     *
     * @param ?string $jzip
     * @return $this
     */
    public function setJzip(?string $jzip);

    /**
     * Get 住所
     *
     * @return ?string
     */
    public function getJadr(): ?string;

    /**
     * Set 住所
     *
     * @param ?string $jadr
     * @return $this
     */
    public function setJadr(?string $jadr);

    /**
     * Get 電話番号
     *
     * @return ?string
     */
    public function getJtel(): ?string;

    /**
     * Set 電話番号
     *
     * @param ?string $jtel
     * @return $this
     */
    public function setJtel(?string $jtel);

    /**
     * Get お届先顧客ID
     *
     * @return ?string
     */
    public function getNmemid(): ?string;

    /**
     * Set お届先顧客ID
     *
     * @param ?string $nmemid
     * @return $this
     */
    public function setNmemid(?string $nmemid);

    /**
     * Get 氏名
     *
     * @return ?string
     */
    public function getNname(): ?string;

    /**
     * Set 氏名
     *
     * @param ?string $nname
     * @return $this
     */
    public function setNname(?string $nname);

    /**
     * Get カナ
     *
     * @return ?string
     */
    public function getNkana(): ?string;

    /**
     * Set カナ
     *
     * @param ?string $nkana
     * @return $this
     */
    public function setNkana(?string $nkana);

    /**
     * Get 郵便番号
     *
     * @return ?string
     */
    public function getNzip(): ?string;

    /**
     * Set 郵便番号
     *
     * @param ?string $nzip
     * @return $this
     */
    public function setNzip(?string $nzip);

    /**
     * Get 電話番号
     *
     * @return ?string
     */
    public function getNtel(): ?string;

    /**
     * Set 電話番号
     *
     * @param ?string $ntel
     * @return $this
     */
    public function setNtel(?string $ntel);
}
<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetBaifile;

use Plugin\AceClient\AceServices\Model\Dependency\Baitai;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface for BaifileModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface BaifileModelInterface extends Baitai\HasBcodeInterface,
                                        Baitai\HasBkCodeInterface,
                                        NoCategory\HasNameInterface,
                                        Good\HasSubNameInterface,
                                        Day\HasSdayInterface
{
    /**
     * Get 媒体経費
     *
     * @return ?int
     */
    public function getKeihi(): ?int;

    /**
     * Set 媒体経費
     *
     * @param ?int $keihi
     * @return $this
     */
    public function setKeihi(?int $keihi);

    /**
     * Get 媒体終了日
     *
     * @return ?AceDateTime\AceDateTimeInterface
     */
    public function getEday();

    /**
     * Set 媒体終了日
     *
     * @param \DateTime|string|null $eday
     * @return $this
     */
    public function setEday($eday);

    /**
     * Get 中止区分
     *
     * @return ?int
     */
    public function getStopfg(): ?int;

    /**
     * Set 中止区分
     *
     * @param ?int $stopfg
     * @return $this
     */
    public function setStopfg(?int $stopfg);

    /**
     * Get フリーコード１
     *
     * @return ?string
     */
    public function getFcode1(): ?string;

    /**
     * Set フリーコード１
     *
     * @param ?string $fcode1
     * @return $this
     */
    public function setFcode1(?string $fcode1);

    /**
     * Get フリーコード２
     *
     * @return ?string
     */
    public function getFcode2(): ?string;

    /**
     * Set フリーコード２
     *
     * @param ?string $fcode2
     * @return $this
     */
    public function setFcode2(?string $fcode2);
}
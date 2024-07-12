<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetPointRireki;

use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;


/**
 * Interface for PointModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface PointModelInterface extends Denpyo\HasDennoInterface,
                                      Day\HasJdayInterface,
                                      Day\HasDayInterface,
                                      Point\HasPointInterface,
                                      NoCategory\HasJmemidInterface,
                                      NoCategory\HasKubunInterface
{
    /**
     * Get ポイント区分
     */
    public function getKubun(): ?int;

    /**
     * Set ポイント区分
     */
    public function setKubun(?int $kubun);

    /**
     * Get 納品先枝番号
     *
     * @return ?int
     */
    public function getNouno(): ?int;

    /**
     * Set 納品先枝番号
     *
     * @param ?int $nouno
     * @return $this
     */
    public function setNouno(?int $nouno);

    /**
     * Get 受注枝番
     *
     * @return ?int
     */
    public function getEdano(): ?int;

    /**
     * Set 受注枝番
     *
     * @param ?int $edano
     * @return $this
     */
    public function setEdano(?int $edano);

    /**
     * Get ポイント種類
     *
     * @return ?int
     */
    public function getBrid(): ?int;

    /**
     * Set ポイント種類
     *
     * @param ?int $brid
     * @return $this
     */
    public function setBrid(?int $brid);

    /**
     * Get 使用区分
     *
     * @return ?int
     */
    public function getUsekbn(): ?int;

    /**
     * Set 使用区分
     *
     * @param ?int $usekbn
     * @return $this
     */
    public function setUsekbn(?int $usekbn);

    /**
     * Get 顧客共有システムID
     *
     * @return ?int
     */
    public function getMsyid(): ?int;

    /**
     * Set 顧客共有システムID
     *
     * @param ?int $msyid
     * @return $this
     */
    public function setMsyid(?int $msyid);

    /**
     * Get 顧客ID
     *
     */
    public function getJmemid(): ?string;

    /**
     * Set 顧客ID
     *
     */
    public function setJmemid(?string $jmemid);

    /**
     * Get 作成ユーザーID
     *
     * @return ?string
     */
    public function getCuser(): ?string;

    /**
     * Set 作成ユーザーID
     *
     * @param ?string $cuser
     * @return $this
     */
    public function setCuser(?string $cuser);

    /**
     * Get 更新ユーザーID
     *
     * @return ?string
     */
    public function getUuser(): ?string;

    /**
     * Set 更新ユーザーID
     *
     * @param ?string $uuser
     * @return $this
     */
    public function setUuser(?string $uuser);
}
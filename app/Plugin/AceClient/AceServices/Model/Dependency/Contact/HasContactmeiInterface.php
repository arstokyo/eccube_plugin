<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Contact;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface for HasContactmei
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasContactmeiInterface extends ContactBaseModelInterface
{
    /**
     * Get 日時
     *
     * @return ?AceDateTime\AceDateTimeInterface
     */
    public function getCondate();

    /**
     * Set 日時
     *
     * @param \DateTime|string|null $condate
     * @return $this
     */
    public function setCondate($condate);

    /**
     * Get 依頼グループ名
     *
     * @return ?string
     */
    public function getRequestgroup(): ?string;

    /**
     * Set 依頼グループ名
     *
     * @param ?string $requestgroup
     * @return $this
     */
    public function setRequestgroup(?string $requestgroup);

    /**
     * Get 依頼ユーザーID
     *
     * @return ?string
     */
    public function getRequestuser(): ?string;

    /**
     * Set 依頼ユーザーID
     *
     * @param ?string $requestuser
     * @return $this
     */
    public function setRequestuser(?string $requestuser);

    /**
     * Get 在宅日
     *
     * @return ?AceDateTime\AceDateTimeInterface
     */
    public function getAthomedate();

    /**
     * Set 在宅日
     *
     * @param \DateTime|string|null $athometime
     * @return $this
     */
    public function setAthomedate($athometime);

    /**
     * Get 在宅時間
     *
     * @return ?string
     */
    public function getAthometime(): ?string;

    /**
     * Set 在宅時間
     *
     * @param ?string $athometime
     * @return $this
     */
    public function setAthometime(?string $athometime);

    /**
     * Get 会話メモ１
     *
     * @return ?string
     */
    public function getNote1(): ?string;

    /**
     * Set 会話メモ１
     *
     * @param ?string $note1
     * @return $this
     */
    public function setNote1(?string $note1);

    /**
     * Get 会話メモ２
     *
     * @return ?string
     */
    public function getNote2(): ?string;

    /**
     * Set 会話メモ２
     *
     * @param ?string $note2
     * @return $this
     */
    public function setNote2(?string $note2);
}
<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Contact;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface for ContactBaseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface ContactBaseModelInterface
{
    /**
     * Get 枝番号
     *
     * @return ?int
     */
    public function getEdano(): ?int;

    /**
     * Set 枝番号
     *
     * @param ?int $edano
     * @return $this
     */
    public function setEdano(?int $edano);

    /**
     * Get ステータス
     *
     * @return ?int
     */
    public function getStatus(): ?int;

    /**
     * Set ステータス
     *
     * @param ?int $status
     * @return $this
     */
    public function setStatus(?int $status);

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
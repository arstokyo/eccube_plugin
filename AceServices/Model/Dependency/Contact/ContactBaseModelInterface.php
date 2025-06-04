<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Dependency\Contact;

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
     *
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
     *
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
     *
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
     *
     * @return $this
     */
    public function setUuser(?string $uuser);
}

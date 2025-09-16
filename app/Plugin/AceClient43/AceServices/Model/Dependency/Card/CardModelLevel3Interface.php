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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Card;

use Plugin\AceClient43\AceServices\Model\Dependency\Card\GMO\HasGMOStatusInterface;

/**
 * Interface for Card Level 3
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface CardModelLevel3Interface extends HasGMOStatusInterface
{
    /**
     * Get SPSステータス
     *
     * @return int|null
     */
    public function getSpsstatus(): ?int;

    /**
     * Set SPSステータス
     *
     * @param int|null $spsstatus
     *
     * @return $this
     */
    public function setSpsstatus(?int $spsstatus);

    /**
     * Get ペイジェント決済ID
     *
     * @return string|null
     */
    public function getPgtkid(): ?string;

    /**
     * Set ペイジェント決済ID
     *
     * @param string|null $pgtkid
     *
     * @return $this
     */
    public function setPgtkid(?string $pgtkid);

    /**
     * Get ペイジェント決済ステータス
     *
     * @return int|null
     */
    public function getPgtstatus(): ?int;

    /**
     * Set ペイジェント決済ステータス
     *
     * @param int|null $pgtstatus
     *
     * @return $this
     */
    public function setPgtstatus(?int $pgtstatus);
}

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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Mail\MemMail;

use Plugin\AceClient43\AceServices\Model\Dependency\Mail\HasMailInterface;

/**
 * Interface For Member Mail
 *
 * @author : Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
interface MemMailModelInterface extends HasMailInterface
{
    /**
     * Get メールアドレス枝番号
     *
     * @return int|null
     */
    public function getIdx(): ?int;

    /**
     * Set メールアドレス枝番号
     *
     * @param int|null $idx
     *
     * @return $this
     */
    public function setIdx(?int $idx);

    /**
     * Get DMメール配信区分
     *
     * @return int|null
     */
    public function getDmmailkbn(): ?int;

    /**
     * Set DMメール配信区分
     *
     * @param int|null $dmmailkbn
     *
     * @return $this
     */
    public function setDmmailkbn(?int $dmmailkbn);
}

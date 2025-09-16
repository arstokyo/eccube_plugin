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

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface HanmeiModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HanmeiModelInterface extends Good\HasGcodeInterface, NoCategory\HasSuuInterface, Cost\Tanka\HasTankaInterface, Cost\Tax\HasTaxKbnInterface
{
    /**
     * Get 更新区分
     *
     * @return ?int
     */
    public function getKousin(): ?int;

    /**
     * Set 更新区分
     *
     * @param ?int $kousin
     *
     * @return $this
     */
    public function setKousin(?int $kousin);

    /**
     * Get 明細サイト
     *
     * @return ?int
     */
    public function getKsite(): ?int;

    /**
     * Set 明細サイト
     *
     * @param ?int $ksite
     *
     * @return $this
     */
    public function setKsite(?int $ksite);

    /**
     * Get 定期区分
     *
     * @return ?int
     */
    public function getTeiki(): ?int;

    /**
     * Set 定期区分
     *
     * @param ?int $teiki
     *
     * @return $this
     */
    public function setTeiki(?int $teiki);
}

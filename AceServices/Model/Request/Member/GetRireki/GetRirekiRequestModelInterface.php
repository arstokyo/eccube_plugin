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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetRireki;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface GetRirekiRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetRirekiRequestModelInterface extends RequestModelInterface, NoCategory\HasMcodeInterface
{
    /**
     * Get IdPrm
     *
     * @return IdPrmModelInterface
     */
    public function getIdPrm(): IdPrmModelInterface;

    /**
     * Set IdPrm
     *
     * @param IdPrmModelInterface $idPrm
     *
     * @return self
     */
    public function setIdPrm(IdPrmModelInterface $idPrm): self;

    /**
     * Get the 表示行数
     *
     * @return ?int
     */
    public function getDispRow(): ?int;

    /**
     * Set the 表示行数
     *
     * @param ?int $dispRow
     */
    public function setDispRow(?int $dispRow);

    /**
     * Get the 表示ページ
     *
     * @return ?int
     */
    public function getDispPage(): ?int;

    /**
     * Set the 表示ページ
     *
     * @param ?int $dispPage
     */
    public function setDispPage(?int $dispPage);

    /**
     * Get the ソートコード
     *
     * @return int
     */
    public function getSort(): int;

    /**
     * Set the ソートコード
     *
     * @param int $sort
     */
    public function setSort(int $sort);
}

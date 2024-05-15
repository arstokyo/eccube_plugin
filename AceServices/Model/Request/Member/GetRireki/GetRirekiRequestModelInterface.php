<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetRireki;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetRirekiRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetRirekiRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface, NoCategory\HasMcodeInterface
{
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
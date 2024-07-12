<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetDurationOrderTotal;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetDurationOrderTotalRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetDurationOrderTotalRequestModelInterface extends RequestModelInterface,
                                                             NoCategory\HasSyidInterface,
                                                             NoCategory\HasMbidInterface
{
    /**
     * Get 開始日付
     *
     * @return ?int
     */
    public function getDayfrom(): ?int;

    /**
     * Set 開始日付
     *
     * @param ?int $dayfrom
     * @return $this
     */
    public function setDayfrom(?int $dayfrom);

    /**
     * Get 終了日付
     *
     * @return ?int
     */
    public function getDayto(): ?int;

    /**
     * Set 終了日付
     *
     * @param ?int $dayto
     * @return $this
     */
    public function setDayto(?int $dayto);
}
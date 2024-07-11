<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetPointRireki;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetPointRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetPointRirekiRequestModelInterface extends RequestModelInterface,
                                                      NoCategory\HasSyidInterface
{
    /**
     * Get 受注顧客ID
     *
     * @return ?string
     */
    public function getJmemid(): ?string;

    /**
     * Set 受注顧客ID
     *
     * @param ?string $jmemid
     * @return $this
     */
    public function setJmemid(?string $jmemid);
}
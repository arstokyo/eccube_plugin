<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetPointRireki;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface GetPointRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetPointRirekiRequestModelInterface extends RequestModelInterface
{
    /**
     * Get 通販AceID
     *
     * @return ?int
     */
    public function getSyid(): ?int;

    /**
     * Set 通販AceID
     *
     * @param ?int $syid
     * @return $this
     */
    public function setSyid(?int $syid);

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
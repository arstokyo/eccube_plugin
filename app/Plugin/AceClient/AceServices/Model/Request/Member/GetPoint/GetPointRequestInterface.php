<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetPoint;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface GetPointRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetPointRequestInterface extends RequestModelInterface
{
    /**
    * Get SystemID
    *
    * @return int
    */
    public function getId(): int;

    /**
     * Set SystemID
     *
     * @param int $id
     * @return self
     */
    public function setId(int $id): self;
    /**
    * Get 顧客コード
    *
    * @return string
    */
    public function getMcode(): string;

    /**
     * Set 顧客コード
     *
     * @param string $mcode
     * @return self
     */
    public function setMcode(string $mcode): self;
}